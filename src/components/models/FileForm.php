<?php

namespace andy87\yii2\builder\components\models;

use yii\base\Model;

/**
 * Class `FileForm`
 *
 * File generate description
 *
 * @package andy87\yii2\builder\components\models
 */
class FileForm extends Model
{
    /** @var string ID */
    public string $id;

    /** @var bool Toggle for skip generate file */
    public bool $skip = false;
}