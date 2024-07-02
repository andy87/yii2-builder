<?php

namespace andy87\yii2\builder\models;

use yii\base\Model;

/**
 * Class BuilderForm
 *
 * @package andy87\yii2\builder\models
 */
class BuilderForm extends Model
{
    public string $name;
    public string $comment;

    /** @var BuilderFieldForm[] */
    public array $fields;

    /** @var BuilderFileForm[] */
    public array $files;
}