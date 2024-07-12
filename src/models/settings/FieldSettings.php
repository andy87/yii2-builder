<?php

namespace andy87\yii2\builder\models\settings;

use andy87\yii2\builder\components\base\BaseModel;

/**
 * Class GenerateFieldSetting
 *
 * @package andy87\yii2\builder\models\settings
 */
class FieldSettings extends BaseModel
{
    /** @var string Column name */
    public string $name;
    public ?string $comment = null;
    public ?string $type = null;
    public ?int $length = null;
    public ?string $default = null;
    public ?bool $notNull = null;
    public ?bool $unique = null;
    public ?bool $foreignKey = null;
}