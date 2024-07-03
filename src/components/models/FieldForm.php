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
    private const NEW = '0';

    /** @var string Column name */
    public string $name = self::NEW;

    /** @var string  */
    public string $comment;

    public array $type;

    public array $notNull;

    public array $default;

    public array $foreignKey;
}