<?php

namespace andy87\yii2\builder\components\models;

use andy87\yii2\builder\components\helpers\Library;
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
    /** @var int ID */
    public int $id = Library::COMMON_MODEL_SOURCES;

    /** @var bool Toggle for skip generate file */
    public bool $skip = false;
}