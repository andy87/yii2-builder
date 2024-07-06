<?php

namespace andy87\yii2\builder\components\models\settings;

use andy87\yii2\builder\components\models\FileSettings;

/**
 * Class GenerateTableSetting
 *
 * @package andy87\yii2\builder\components\models\settings
 */
class GenerateTableSetting
{
    public string $tableName;

    public ?string $tableComment = null;

    public ?GenerateModelSetting $generateModelSetting = null;

    /** @var GenerateFieldSetting[]  */
    public array $collectionGenerateFieldSetting;

    /** @var GenerateFileSetting[]  */
    public array $collectionGenerateFileSetting = [];

    public function __construct( string $tableName, ?GenerateModelSetting $generateModelSetting = null )
    {
        $this->updateTableComment($generateModelSetting);
    }

    /**
     * @param $generateModelSetting
     *
     * @return void
     */
    private function updateTableComment($generateModelSetting): void
    {
        if ( $generateModelSetting ) {
            $this->tableComment = $generateModelSetting->plural ?? null;
        }
    }

    /**
     * @param array $collectionGenerateFieldSetting
     *
     * @return void
     */
    public function setupCollectionGenerateFieldSetting( array $collectionGenerateFieldSetting = [] ): void
    {
        if ( count($collectionGenerateFieldSetting) )
        {
            foreach ( $collectionGenerateFieldSetting as $generateFieldSetting)
            {
                $this->collectionGenerateFieldSetting[] = new GenerateFieldSetting( $generateFieldSetting );
            }
        }
    }

    /**
     * @param array $collectionGenerateFileSetting
     *
     * @return void
     */
    public function setupCollectionGenerateFileSetting( array $collectionGenerateFileSetting = [] ): void
    {
        if ( count($collectionGenerateFileSetting) )
        {
            foreach ( $collectionGenerateFileSetting as $generateFileSetting)
            {
                $this->collectionGenerateFileSetting[] = new GenerateFileSetting( $generateFileSetting );
            }
        }
    }
}