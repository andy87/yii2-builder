<?php

namespace andy87\yii2\builder\components\models\settings;

use andy87\yii2\builder\components\base\BaseModel;

/**
 * Class GenerateTableSetting
 *
 * @package andy87\yii2\builder\components\models\settings
 */
class GenerateModelSetting extends BaseModel
{
    public const ATTR_SINGULAR = 'singular';

    public const ATTR_PLURAL = 'plural';


    /** @var string Единчственное число */
    public string $singular;

    /** @var string Множественное число */
    public string $plural;

    /**
     * @return array[]
     */
    public function rule(): array
    {
        return [
            [[self::ATTR_SINGULAR, self::ATTR_PLURAL], 'required'],
            [[self::ATTR_SINGULAR, self::ATTR_PLURAL], 'string'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            self::ATTR_SINGULAR => 'Единственное число',
            self::ATTR_PLURAL => 'Множественное число',
        ];
    }
}