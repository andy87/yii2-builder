<?php

namespace andy87\yii2\builder\components\models;

use yii\base\Model;

/**
 * Class `FieldForm`
 *
 * Table columns description
 *
 * @package andy87\yii2\builder\components\models
 */
class FieldForm extends Model
{
    /** @var string Column name */
    public string $name;

    /** @var string  */
    public string $comment;

    public array $type;

    public array $notNull;

    public array $default;

    public array $foreignKey;
}