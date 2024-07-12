<?php

namespace andy87\yii2\builder\models\forms;

use andy87\yii2\builder\components\helpers\Library;
use andy87\yii2\builder\components\traits\FormTrait;
use andy87\yii2\builder\models\collections\CollectionTableInfo;
use andy87\yii2\builder\models\settings\GenerateFileSettings;
use andy87\yii2\builder\models\settings\FileFilterSettings;

/**
 * Class GenerateFileForm
 *
 * @package andy87\yii2\builder\models\forms
 */
class FileFilterSettingsForm extends FileFilterSettings
{
    use FormTrait;

    public const ATTR_ID = 'id';
    public const ATTR_GENERATE = 'generate';
    public const ATTR_PATH = 'path';


    public string $index = TableForm::NEW;

    public array $naming = [
        CollectionTableInfo::ATTR_NEW_TABLE_INFO_FORM => 'TableInfoForm[listFileForm][%s][%s]',
        CollectionTableInfo::ATTR_LIST_TABLE_INFO_FORMS =>  'CollectionTableInfo[listTableInfoForm][%s][listFileForm][%s][%s]',
    ];

    /** @var string|int ID */
    public string|int $id = Library::COMMON_MODEL_SOURCES;

    /** @var bool Toggle for skip generate file */
    public bool $generate = true;

    public string $path;

    public GenerateFileSettings $generateFileSettings;



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
}