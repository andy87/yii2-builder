<?php

namespace andy87\yii2\builder\components;

use Yii;
use yii\gii\Generator;
use andy87\yii2\builder\components\services\{ CacheService, FormService, AccordionService };
use andy87\yii2\builder\components\models\{ TableForm, FileSettings, collections\CollectionTableForm };

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
    public const SRC = '@vendor/andy87/yii2-builder/src';

    /** @var string Path with view directory */
    public const VIEWS = self::SRC . '/views';

    private const CACHE_EXT = 'json';

    /** @var ?string Path with cache directory */
    public ?string $pathCache = null;

    /** @var FileSettings[] Collection settings for custom generation  */
    public array $extension = [];

    /** @var string Path with templates */
    public string $dirWithTemplates = self::SRC . '/templates';

    /** @var FileSettings[] Collection settings for generation */
    public array $listGenerateFileSetting = [];

    /** @var CollectionTableForm Collection TableForm */
    public CollectionTableForm $collectionTableForm;

    /** @var TableForm */
    public TableForm $tableForm;

    public FormService $formService;
    public CacheService $cacheService;
    public AccordionService $accordionService;



    /**
     * Initialization
     *
     * @return void
     */
    public function init(): void
    {
        parent::init();

        $this->cacheService = new CacheService( $this->pathCache, self::CACHE_EXT, );

        $this->formService = new FormService($this->cacheService);

        $this->accordionService = new AccordionService(self::VIEWS);

        $this->run();
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
     * @return void
     */
    public function run(): void
    {
        $this->updateConfig();

        $this->tableForm = $this->formService->getBlankTableForm($this);

        $this->formService->requestHandler($this);

        $this->collectionTableForm = new CollectionTableForm([
            CollectionTableForm::ATTR_TABLE_FORMS => $this->cacheService->findTablesForm()
        ]);
    }


    /**
     * @return void
     */
    private function updateConfig(): void
    {
        if (empty($this->listGenerateFileSetting))
        {
            $this->listGenerateFileSetting = require Yii::getAlias(self::SRC . '/config.php');

            foreach ($this->extension as $key => $config)
            {
                $this->listGenerateFileSetting[$key] = $config;
            }
        }
    }
}