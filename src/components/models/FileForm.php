<?php

namespace andy87\yii2\builder\components\models;

use yii\base\Model;
use andy87\yii2\builder\components\helpers\Library;

/**
 * Class `FileForm`
 *
 * File generate description
 *
 * @package andy87\yii2\builder\components\models
 */
class FileForm extends Model
{
    /** @var string|int ID */
    public string|int $id = Library::COMMON_MODEL_SOURCES;

    /** @var bool Toggle for skip generate file */
    public bool $skip = false;

    public string $path;
}