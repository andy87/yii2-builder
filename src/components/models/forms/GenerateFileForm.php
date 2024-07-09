<?php

namespace andy87\yii2\builder\components\models\forms;

use andy87\yii2\builder\components\helpers\Library;
use andy87\yii2\builder\components\models\settings\FileSettings;
use andy87\yii2\builder\components\models\settings\GenerateFileSetting;
use yii\bootstrap5\Html;

/**
 * Class GenerateFileForm
 *
 * @package andy87\yii2\builder\components\models\forms
 */
class GenerateFileForm extends GenerateFileSetting
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



    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [[self::ATTR_ID, self::ATTR_GENERATE, self::ATTR_PATH], 'required'],
            [[self::ATTR_ID], 'string'],
            [[self::ATTR_GENERATE], 'boolean'],
            [[self::ATTR_PATH], 'string'],
        ];
    }

    /**
     * @param string $file_id
     * @param GenerateFileForm $generateFileForm
     * @param string $index
     * @return string
     */
    public function checkbox( GenerateFileForm $generateFileForm, string $index): string
    {
        $className = self::getClassName(static::class);

        $name = "{$className}[$generateFileForm->id]";

        return Html::checkbox($name, $generateFileForm->generate );
    }
}