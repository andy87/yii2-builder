<?php declare(strict_types=1);

namespace andy87\yii2\builder\components\services;

use andy87\yii2\builder\components\models\collections\CollectionGenerateTableSettings;
use andy87\yii2\builder\components\models\forms\GenerateFileForm;
use Yii;
use Exception;
use andy87\yii2\builder\components\Builder;
use andy87\yii2\builder\components\models\forms\GenerateTableForm;
use andy87\yii2\builder\components\models\collections\CollectionGenerateTableForm;

/**
 * Class FormService
 *
 * @package andy87\yii2\builder\components\services
 */
class FormService
{
    public function __construct(private CacheService $cacheService) {}

    /**
     *
     * @return FormService
     * @throws Exception
     */
    public static function getInstance(): FormService
    {
        if ( isset(Builder::$instances[static::class]) ) {
            return Builder::$instances[static::class];
        }

        throw new Exception('Error: ' . static::class . ' not found in Builder::$instances');
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

            echo '<pre>';
            print_r(['$post' => $post]);
            echo '</pre>';
            exit();
        }
    }

    public function getCollectionGenerateTableForm(Builder $param): CollectionGenerateTableForm
    {
        $collectionGenerateTableForm = new CollectionGenerateTableForm();

        $collectionGenerateTableForm->generateTableForm = $this->getBlankGenerateTableForm($param);

        return $collectionGenerateTableForm;
    }

    /**
     * @param Builder $builder
     *
     * @return GenerateTableForm
     */
    public function getBlankGenerateTableForm( Builder $builder ): GenerateTableForm
    {
        $generateTableForm = $this->getModelGenerateTableForm();

        $generateTableForm->listGenerateFileForm = $this->prepareListGenerateFileForm($builder->listGenerateFileSetting);

        return $generateTableForm;
    }

    /**
     * @return GenerateTableForm
     */
    public function getModelGenerateTableForm(): GenerateTableForm
    {
        return new GenerateTableForm();
    }

    /**
     * @param array $listGenerateFileSetting
     *
     * @return GenerateFileForm[]
     */
    private function prepareListGenerateFileForm(array $listGenerateFileSetting): array
    {
        $listGenerateFileForm = [];

        /*foreach ( $listGenerateFileSetting as $generateFileSetting )
        {
            $generateFileForm = new GenerateFileForm();

            $generateFileForm->setAttributes($generateFileSetting);

            $listGenerateFileForm[] = $generateFileForm;
        }*/

        return $listGenerateFileForm;
    }

    /**
     * @return CollectionGenerateTableSettings
     *
     * @throws Exception
     */
    public function getCollectionGenerateTableSettings(): CollectionGenerateTableSettings
    {
        $collectionGenerateTableSettings = new CollectionGenerateTableSettings();

        $collectionGenerateTableSettings->listGenerateTableSetting = CacheService::getInstance()->getListGenerateTableSettings();

        return $collectionGenerateTableSettings;
    }
}