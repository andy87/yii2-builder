<?php

namespace andy87\yii2\builder\components\models\settings;

use yii\base\Model;

/**
 * Class GenerateTableSetting
 *
 * @package andy87\yii2\builder\components\models\settings
 */
class GenerateModelSetting extends Model
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
}