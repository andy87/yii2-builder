<?php

namespace andy87\yii2\builder\components;

use Yii;
use yii\gii\Generator;
use andy87\yii2\builder\components\models\{ActionsForm, CollectionTableForm, TableForm, FileSettings};

/**
 * Class Builder
 *
 * @package andy87\yii2\architect\components
 */
class Builder extends Generator
{
    /** @var string ID on module list */
    public const ID = 'builder';

    public const HINT = 'Yii2 Builder - расширение для модуля Gii в фреймворке Yii2 упрощающее генерацию файлов';

    /** @var string Path on root directory */
    public const ROOT = '@vendor/andy87/yii2-builder/src';

    /** @var string Path with view directory */
    public const VIEWS = self::ROOT . '/views';

    private const CACHE_EXT = 'json';

    /** @var string Path with cache directory */
    public string $pathCache = '@app/runtime/cache-yii2-builder/';

    /** @var FileSettings[] Collection settings for custom generation  */
    public array $extension = [];

    /** @var string Path with templates */
    public string $dirWithTemplates = self::ROOT . '/templates';

    /** @var FileSettings[] Collection settings for generation */
    public array $config = [];

    /** @var TableForm[] Collection TableForm */
    public array $collectionTableForm = [];

    /** @var TableForm */
    public TableForm $tableForm;

    private string $mode = self::VIEWS . '/clear';



    /**
     * Initialization
     *
     * @return void
     */
    public function init(): void
    {
        parent::init();

        $this->updateConfig();

        $this->checkDir(
            $this->getCacheDir()
        );

        $this->tableForm = $this->getModelTableForm();

        $this->requestHandler();

        $this->collectionTableForm = $this->getCachedTablesForm();
    }


    /**
     * Get path to view
     *
     * @return string
     */
    public function formView(): string
    {
        return self::VIEWS . '/display.php';
    }

    /**
     * Return ext `name`
     *
     * @return string
     */
    public function getName(): string
    {
        return ucfirst(self::ID);
    }

    /**
     * Return ext `description`
     *
     * @return string
     */
    public function getDescription(): string
    {
        return self::HINT;
    }

    /**
     * ????
     *
     * @return string
     */
    public function generate(): string
    {
        return 'Hello, world!';
    }

    /**
     * Return cache collection TableForm
     *
     * @return TableForm[]
     */
    public function getCachedTablesForm(): array
    {
        $cacheDir = $this->getCacheDir();

        $files = glob($cacheDir . '*.' . self::CACHE_EXT );

        $collectionTableForm = [];

        foreach ($files as $path)
        {
            if (in_array($path,['.','..']) ) continue;

            if ( is_file($path) )
            {
                $content = file_get_contents($path);

                $fileName = pathinfo($path, PATHINFO_FILENAME);

                $collectionTableForm[$fileName] = unserialize($content);
            }
        }

        return $collectionTableForm;
    }

    /**
     * @param string $dir
     *
     * @return void
     */
    private function checkDir(string $dir ): void
    {
        if (is_dir($dir)) return;

        mkdir($dir, 0777, true);
    }

    /**
     * @return string
     */
    private function getCacheDir(): string
    {
        return Yii::getAlias($this->pathCache);
    }

    /**
     * @return void
     */
    private function updateConfig(): void
    {
        $config = require Yii::getAlias(self::ROOT . '/config.php');

        $this->config = array_merge($config, $this->extension);
    }

    /**
     * @return array
     */
    public function getAccordionItems(): array
    {
        $accordionItems = [];

        foreach ( $this->collectionTableForm as $fileName => $tableForm )
        {
            $accordionItems[] = [
                'label' => $fileName,
                'content' => $this->renderAccordionItem($tableForm),
            ];
        }

        return $accordionItems;
    }

    /**
     * @param TableForm $tableForm
     *
     * @return string
     */
    private function renderAccordionItem(TableForm $tableForm): string
    {
        $templatePath = Yii::getAlias(self::VIEWS) . '/accordion-item.php';

        return Yii::$app->view->renderFile( $templatePath, [ 'tableForm' => $tableForm ]);
    }

    /**
     * @return void
     */
    private function requestHandler(): void
    {
        $request = Yii::$app->request;

        if ( $request->isPost )
        {
            $collectionTableForm = new CollectionTableForm();
            $collectionTableForm->load($request->post());

            if ( count($collectionTableForm->groups) )
            {
                foreach ( $collectionTableForm->groups as $tableForm )
                {
                    $tableForm = new TableForm($tableForm);

                    switch ($tableForm->action)
                    {
                        case TableForm::ACTION_ADD:
                            $this->addCacheTableForm($tableForm);
                            break;

                        case TableForm::ACTION_UPDATE:
                            $this->updateCacheTableForm($tableForm);
                            break;

                        case TableForm::ACTION_REMOVE:
                            $this->removeCacheTableForm($tableForm->tableName);
                            continue 2;

                        default:
                            continue 2;
                    }
                }
            }
        }
    }

    /**
     * @return TableForm
     */
    private function getModelTableForm(): TableForm
    {
        return new TableForm();
    }

    /**
     * @param TableForm $tableForm
     *
     * @return void
     */
    private function addCacheTableForm(TableForm $tableForm): void
    {
        $tableForm->id = $tableForm->tableName;

        $path = $this->cacheFilePath($tableForm->tableName);

        $content = serialize($tableForm);

        (bool)file_put_contents($path, $content);
    }

    /**
     * @param TableForm $tableForm
     *
     * @return void
     */
    private function updateCacheTableForm(TableForm $tableForm): void
    {
        $this->removeCacheTableForm($tableForm->tableName);

        $tableForm->id = $tableForm->tableName;

        $content = serialize($tableForm);

        $path = $this->cacheFilePath($tableForm->tableName);

        (bool) file_put_contents($path, $content);
    }

    /**
     * @param string $name
     *
     * @return string
     */
    private function cacheFilePath( string $name ): string
    {
        $cacheDir = $this->getCacheDir();

        return $cacheDir . "$name." . self::CACHE_EXT;
    }

    /**
     * @param string $name
     *
     * @return void
     */
    private function removeCacheTableForm(string $name): void
    {
        $path = $this->cacheFilePath($name);

        if ( file_exists($path) ) unlink($path);
    }

    /**
     * @return ActionsForm
     */
    private function getModelActionsForm(): ActionsForm
    {
        return new ActionsForm();
    }

    /**
     * @param ActionsForm $actionsForm
     * @return void
     */
    private function actionsHandler(ActionsForm $actionsForm): void
    {
        if ( $actionsForm->remove )
        {
            $this->removeCacheTableForm($actionsForm->remove);
        }
    }

    /**
     * @return void
     */
    private function clearCache(): void
    {
        $cacheDir = $this->getCacheDir();

        $files = glob($cacheDir . '*.' . self::CACHE_EXT );

        foreach ($files as $path)
        {
            if (in_array($path,['.','..']) ) continue;

            if ( is_file($path) )
            {
                unlink($path);
            }
        }
    }
}