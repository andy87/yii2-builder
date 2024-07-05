<?php declare(strict_types=1);

namespace andy87\yii2\builder\components\services;

use andy87\yii2\builder\components\models\collections\CollectionFieldForm;
use andy87\yii2\builder\components\models\collections\CollectionFileForm;
use andy87\yii2\builder\components\models\collections\CollectionTableForm;
use andy87\yii2\builder\components\models\FieldForm;
use andy87\yii2\builder\components\models\FileForm;
use andy87\yii2\builder\components\models\FileSettings;
use andy87\yii2\builder\components\models\TableForm;
use Yii;

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
     * @param array $config
     *
     * @return TableForm
     */
    public function getBlankTableForm( array $config ): TableForm
    {
        $tableForm = $this->getModelTableForm();

        $tableForm->collectionFileForm = $this->getBlankCollectionFileForm($config);

        return $tableForm;
    }

    /**
     * @return void
     */
    public function requestHandler(): void
    {
        $request = Yii::$app->request;

        if ( $request->isPost )
        {
            $post = $request->post();

            $collectionTableForm = new CollectionTableForm();
            $collectionTableForm->load($post);

            if ( count($collectionTableForm->{CollectionTableForm::ATTR_TABLE_FORMS}) )
            {
                foreach ( $collectionTableForm->{CollectionTableForm::ATTR_TABLE_FORMS} as $tableForm )
                {
                    if( !isset($tableForm['action']) ) continue;

                    $tableForm[TableForm::ATTR_FIELDS] = $this->prepareCollectionFieldForm($tableForm);
                    $tableForm[TableForm::ATTR_FILES] = $this->prepareCollectionFileForm($tableForm);
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
     * @param mixed $tableForm
     *
     * @return CollectionFieldForm
     */
    private function prepareCollectionFieldForm(mixed $tableForm): CollectionFieldForm
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
     * @param mixed $tableForm
     *
     * @return CollectionFileForm
     */
    private function prepareCollectionFileForm(mixed $tableForm): CollectionFileForm
    {
        return new CollectionFileForm([
            CollectionFileForm::ATTR_FILE_FORMS => []
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
     * @param FileSettings[] $config
     *
     * @return CollectionFileForm
     */
    private function getBlankCollectionFileForm(array $config): CollectionFileForm
    {
        return new CollectionFileForm([
            CollectionFileForm::ATTR_FILE_FORMS => $this->generateCollectionFileFormByFileSettings($config)
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
}