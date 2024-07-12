<?php

namespace andy87\yii2\builder\models\settings;

use andy87\yii2\builder\components\base\BaseModel;

/**
 * Class GenerateTableSetting
 *
 * @package andy87\yii2\builder\models\settings
 */
class TableSetting extends BaseModel
{
    public string $tableName;
    public const ATTR_TABLE_NAME = 'tableName';

    public string $tableComment;
    public const ATTR_TABLE_COMMENT = 'tableComment';


    public ModelInfoSetting $modelSetting;
    public const ATTR_MODEL_SETTING = 'modelSetting';


    /** @var FieldSettings[]  */
    public array $listFieldSetting = [];
    public const ATTR_LIST_FIELD_SETTING = 'listFieldSetting';


    /** @var FileFilterSettings[]  */
    public array $listFileSetting = [];
    public const ATTR_LIST_FILE_SETTING = 'listFileSetting';



    /**
     * @return void
     */
    public function init(): void
    {
        parent::init();

        $this->{self::ATTR_MODEL_SETTING} = new ModelInfoSetting;
    }

    /**
     * @return array
     */
    public function rule(): array
    {
        return [
            [[self::ATTR_TABLE_NAME], 'required'],
            [[self::ATTR_TABLE_NAME, self::ATTR_TABLE_COMMENT], 'string'],
            [[self::ATTR_MODEL_SETTING], 'each', 'rule' => ['safe']],
            [[self::ATTR_LIST_FIELD_SETTING], 'each', 'rule' => ['class', FieldSettings::class]],
            [[self::ATTR_LIST_FILE_SETTING], 'each', 'rule' => ['class', FileFilterSettings::class]],
        ];
    }
}