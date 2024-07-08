<?php

namespace andy87\yii2\builder\components\models\settings;

use andy87\yii2\builder\components\base\BaseModel;
use andy87\yii2\builder\components\helpers\Library;

/**
 * Class GenerateFileSetting
 *
 * @package andy87\yii2\builder\components\models\settings
 */
class GenerateFileSetting extends BaseModel
{
    /** @var string|int ID */
    public string|int $id = Library::COMMON_MODEL_SOURCES;

    /** @var bool Toggle for skip generate file */
    public bool $generate = true;
}