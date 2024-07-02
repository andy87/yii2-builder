<?php

namespace andy87\yii2\builder\models;

use yii\base\Model;

/**
 * Class BuilderFieldForm
 *
 * @package andy87\yii2\builder\models
 */
class BuilderFieldForm extends Model
{
    public string $name;
    public string $comment;
    public array $type;
    public array $notNull;
    public array $default;
    public array $foreignKey;
}