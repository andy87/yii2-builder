<?php

namespace andy87\yii2\builder\components\models\settings;

use yii\base\Model;
use andy87\yii2\builder\components\helpers\Library;
use andy87\yii2\builder\components\models\FileSettings;

/**
 * Class GenerateFileSetting
 *
 * @package andy87\yii2\builder\components\models\settings
 */
class GenerateFileSetting extends Model
{

    /** @var string|int ID */
    public string|int $id = Library::COMMON_MODEL_SOURCES;

    /** @var bool Toggle for skip generate file */
    public bool $generate = true;

    public FileSettings $settings;
}