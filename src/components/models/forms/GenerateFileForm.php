<?php

namespace andy87\yii2\builder\components\models\forms;

use andy87\yii2\builder\components\helpers\Library;
use andy87\yii2\builder\components\models\FileSettings;
use yii\base\Model;

/**
 * Class GenerateFileForm
 *
 * @package andy87\yii2\builder\components\models\forms
 */
class GenerateFileForm extends Model
{
    public const ATTR_ID = 'id';
    public const ATTR_GENERATE = 'generate';
    public const ATTR_PATH = 'path';


    /** @var string|int ID */
    public string|int $id = Library::COMMON_MODEL_SOURCES;

    /** @var bool Toggle for skip generate file */
    public bool $generate = true;

    public string $path;

    public FileSettings $settings;
}