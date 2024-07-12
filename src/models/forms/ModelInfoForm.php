<?php

namespace andy87\yii2\builder\models\forms;


use andy87\yii2\builder\components\traits\FormTrait;
use andy87\yii2\builder\models\collections\CollectionTableInfo;
use andy87\yii2\builder\models\settings\ModelInfoSetting;

/**
 * Class GenerateModelForm
 *
 * @package andy87\yii2\builder\models\forms
 */
class ModelInfoForm extends ModelInfoSetting
{
    use FormTrait;

    public const ATTR_SINGULAR = 'singular';

    public const ATTR_PLURAL = 'plural';


    /** @var string  */
    public string $index = TableForm::NEW;

    public array $naming = [
        CollectionTableInfo::ATTR_NEW_TABLE_INFO_FORM => 'TableInfoForm[modelInfoForm][%s]',
        CollectionTableInfo::ATTR_LIST_TABLE_INFO_FORMS =>  'CollectionTableInfo[listTableInfoForm][%s][modelInfoForm][%s]',
    ];



    /**
     * @return array[]
     */
    public function rule(): array
    {
        return [
            [[self::ATTR_SINGULAR, self::ATTR_PLURAL], 'required'],
            [[self::ATTR_SINGULAR, self::ATTR_PLURAL], 'string'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            self::ATTR_SINGULAR => 'Единственное число',
            self::ATTR_PLURAL => 'Множественное число',
        ];
    }
}