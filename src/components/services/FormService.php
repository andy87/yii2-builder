<?php declare(strict_types=1);

namespace andy87\yii2\builder\components\services;

use andy87\yii2\builder\components\Builder;
use andy87\yii2\builder\components\helpers\NameCase;
use Yii;
use andy87\yii2\builder\components\models\FieldForm;
use andy87\yii2\builder\components\models\FileForm;
use andy87\yii2\builder\components\models\FileSettings;
use andy87\yii2\builder\components\models\TableForm;
use andy87\yii2\builder\components\models\collections\CollectionFieldForm;
use andy87\yii2\builder\components\models\collections\CollectionFileForm;
use andy87\yii2\builder\components\models\collections\CollectionTableForm;
use yii\helpers\Inflector;

/**
 * Class FormService
 *
 * @package andy87\yii2\builder\components\services
 */
class FormService
{
    public function __construct(private CacheService $cacheService) {}


    /**
     * @return TableForm
     */
    public function getModelTableForm(): TableForm
    {
        return new TableForm();
    }

    /**
     * @param Builder $builder
     *
     * @return TableForm
     */
    public function getBlankTableForm( Builder $builder ): TableForm
    {
        $tableForm = $this->getModelTableForm();

        $tableForm->collectionFileForm = $this->getBlankCollectionFileForm($builder);

        return $tableForm;
    }

    /**
     * @param Builder $builder
     * -
     * @return void
     */
    public function requestHandler(Builder $builder): void
    {
        $request = Yii::$app->request;

        if ( $request->isPost )
        {
            $post = $request->post();

            $collectionTableForm = new CollectionTableForm();
            $collectionTableForm->load($post);

            if ( count($collectionTableForm->tableForms) )
            {
                foreach ( $collectionTableForm->tableForms as $tableForm )
                {
                    if( !isset($tableForm['action']) ) continue;

                    $tableForm[TableForm::ATTR_FIELDS] = $this->prepareCollectionFieldForm($tableForm);
                    $tableForm[TableForm::ATTR_FILES] = $this->prepareCollectionFileForm($tableForm, $builder);

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
     * @param array $tableForm
     *
     * @return CollectionFieldForm
     */
    private function prepareCollectionFieldForm(array $tableForm): CollectionFieldForm
    {
        $collectionFieldForm = [];

        if ( count($tableForm[TableForm::ATTR_FIELDS]) )
        {
            foreach ( $tableForm[TableForm::ATTR_FIELDS] as $key => $postFieldForm )
            {
                if ( $key == 0 ) continue;

                $fieldForm = new FieldForm();
                $fieldForm->load($postFieldForm);

                if ( $fieldForm->validate() ){

                    $collectionFieldForm[] = $fieldForm;
                } else {
                    echo '<pre>';
                    print_r(['$fieldForm->errors' => $fieldForm->errors]);
                    echo '</pre>';
                    exit();
                }
            }
        }

        return new CollectionFieldForm([
            CollectionFieldForm::ATTR_FIELDS_FORMS => $collectionFieldForm
        ]);
    }

    /**
     * @param array $tableForm
     * @param Builder $builder
     *
     * @return CollectionFileForm
     */
    private function prepareCollectionFileForm(array $tableForm, Builder $builder): CollectionFileForm
    {
        $collectionFileForm = [];

        if ( count($tableForm[TableForm::ATTR_FILES]) )
        {
            foreach ( $tableForm[TableForm::ATTR_FILES] as $key => $postFileForm )
            {
                if ( $key == 0 ) continue;

                $fileForm = new FileForm();
                $fileForm->load($postFileForm);

                if ( $fileForm->validate() )
                {
                    $fileForm->settings = $this->setupFileFormSettings($fileForm, $tableForm['tableName'], clone $builder->listGenerateFileSetting[$fileForm->id]);

                    $collectionFileForm[] = $fileForm;

                } else {
                    echo '<pre>';
                    print_r(['$fileForm->errors' => $fileForm->errors]);
                    echo '</pre>';
                    exit();
                }
            }
        }

        return new CollectionFileForm([
            CollectionFileForm::ATTR_FILE_FORMS => $collectionFileForm
        ]);
    }


    /**
     * @param TableForm $tableForm
     *
     * @return void
     */
    private function addCacheTableForm(TableForm $tableForm): void
    {
        $tableForm->id = $tableForm->tableName;

        $path = $this->cacheService->filePath($tableForm->tableName);

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

        $path = $this->cacheService->filePath($tableForm->tableName);

        (bool) file_put_contents($path, $content);
    }


    /**
     * @param string $name
     *
     * @return void
     */
    private function removeCacheTableForm(string $name): void
    {
        $path = $this->cacheService->filePath($name);

        if ( file_exists($path) ) unlink($path);
    }

    /**
     * @param Builder $builder
     *
     * @return CollectionFileForm
     */
    private function getBlankCollectionFileForm(Builder $builder): CollectionFileForm
    {
        return new CollectionFileForm([
            CollectionFileForm::ATTR_FILE_FORMS => $this->generateCollectionFileFormByFileSettings($builder->listGenerateFileSetting)
        ]);
    }

    /**
     * @param array $config
     *
     * @return FileForm[]
     */
    private function generateCollectionFileFormByFileSettings(array $config): array
    {
        $collectionFileForm = [];

        foreach ($config as $file_id => $fileSettings )
        {
            $fileForm = new FileForm();
            $fileForm->id = $file_id;
            $fileForm->path = $fileSettings->dirFile . $fileSettings->fileName;
            $collectionFileForm[] = $fileForm;
        }

        return $collectionFileForm;
    }

    /**
     * @param FileForm $fileForm
     * @param string $tableName
     * @param FileSettings $fileSettings
     *
     * @return ?FileSettings
     */
    private function setupFileFormSettings(FileForm $fileForm, string $tableName, FileSettings $fileSettings): ?FileSettings
    {
        if ( $fileForm->generate )
        {
            $replace = [
                NameCase::SNAKE => $tableName,
                NameCase::KEBAB => str_replace('_', '-', $tableName),
            ];

            $replace[NameCase::PASCAL] = Inflector::id2camel($replace[NameCase::KEBAB]);
            $replace[NameCase::CAMEL] = lcfirst($replace[NameCase::PASCAL]);

            $from = array_keys($replace);
            $to = array_values($replace);

            $fileSettings->fileName = str_replace($from, $to, $fileSettings->fileName);
        }

        return $fileSettings;
    }
}