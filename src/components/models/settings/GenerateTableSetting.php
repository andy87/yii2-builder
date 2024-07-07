<?php

namespace andy87\yii2\builder\components\models\settings;

use yii\base\Model;

/**
 * Class GenerateTableSetting
 *
 * @package andy87\yii2\builder\components\models\settings
 */
class GenerateTableSetting extends Model
{
    public const ATTR_TABLE_NAME = 'tableName';
    public const ATTR_TABLE_COMMENT = 'tableComment';

    public const ATTR_GENERATE_MODEL_SETTING = 'generateModelSetting';

    public const ATTR_GENERATE_FIELD_SETTING = 'generateFieldSetting';

    public const ATTR_GENERATE_FILE_SETTING = 'generateFileSetting';

    public string $tableName;

    public ?string $tableComment = null;

    public ?GenerateModelSetting $generateModelSetting = null;

    /** @var GenerateFieldSetting[]  */
    public array $collectionGenerateFieldSetting = [];

    /** @var GenerateFileSetting[]  */
    public array $collectionGenerateFileSetting = [];



    /**
     * @return void
     */
    public function init(): void
    {
        parent::init();

        $this->generateModelSetting = new GenerateModelSetting;
    }

    /**
     * @return array
     */
    public function rule(): array
    {
        return [
            [[self::ATTR_TABLE_NAME], 'required'],
            [[self::ATTR_TABLE_NAME, self::ATTR_TABLE_COMMENT], 'string'],
            [[self::ATTR_GENERATE_MODEL_SETTING], 'each', 'rule' => ['safe']],
            [[self::ATTR_GENERATE_FIELD_SETTING], 'each', 'rule' => ['class', GenerateFieldSetting::class]],
            [[self::ATTR_GENERATE_FILE_SETTING], 'each', 'rule' => ['class', GenerateFileSetting::class]],
        ];
    }
}