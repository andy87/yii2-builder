<?php

namespace andy87\yii2\builder\models\forms;

use andy87\yii2\builder\components\traits\FormTrait;
use andy87\yii2\builder\models\collections\CollectionTableInfo;
use andy87\yii2\builder\models\settings\TableSetting;

/**
 * Class GenerateTableForm
 *
 * @package andy87\yii2\builder\models\forms
 */
class TableForm extends TableSetting
{
    use FormTrait;

    public const NEW = '0';


    public const ATTR_MODEL_INFO_FORM = 'modelInfoForm';

    public const ATTR_LIST_FIELD_FORM = 'listFieldForm';

    public const ATTR_LIST_FILE_FORM = 'listFileForm';



    /** @var string  */
    public string $index = self::NEW;

    public array $naming = [
        CollectionTableInfo::ATTR_NEW_TABLE_INFO_FORM => 'TableInfoForm[%s]',
        CollectionTableInfo::ATTR_LIST_TABLE_INFO_FORMS =>  'CollectionTableInfo[listTableInfoForm][%s][%s]',
    ];



    /**
     * <input type="file" name="TableInfoForm[modelInfoForm][singular]" >
     * <input type="file" name="TableInfoForm[modelInfoForm][plural]" >
     *
     * @var ModelInfoForm
     */
    public ModelInfoForm $modelInfoForm;

    /**
     * <input type="string" name="TableInfoForm[listFieldForm][ {key} ][name]">
     * <input type="string" name="TableInfoForm[listFieldForm][ {key} ][comment]">
     * <input type="string" name="TableInfoForm[listFieldForm][ {key} ][type]">
     * <input type="string" name="TableInfoForm[listFieldForm][ {key} ][default]">
     * <input type="string" name="TableInfoForm[listFieldForm][ {key} ][length]">
     * <input type="string" name="TableInfoForm[listFieldForm][ {key} ][notNull]">
     * <input type="string" name="TableInfoForm[listFieldForm][ {key} ][unique]">
     * <input type="string" name="TableInfoForm[listFieldForm][ {key} ][foreignKey]">
     *
     * @var FieldForm
     */
    public FieldForm $fieldForm;

    /**
     * <input type="string" name="ableInfoForm[listFileForm][ {path} ][requred]">
     *
     * @var FileFilterSettingsForm
     */
    public FileFilterSettingsForm $fileForm;

    /**
     *
     *
     * @var FieldForm[]
     */
    public array $listFieldForm = [];

    /**
     *
     *
     * @var FileFilterSettingsForm[]
     */
    public array $listFileForm = [];



    /**
     * @return void
     */
    public function init(): void
    {
        parent::init();

        $this->index = self::NEW;

        $this->modelInfoForm = new ModelInfoForm;
        $this->modelInfoForm->index = $this->index;

        $this->fieldForm = new FieldForm;
        $this->fieldForm->index = $this->index;

        $this->fileForm = new FileFilterSettingsForm;
        $this->fileForm->index = $this->index;
    }

    /**
     * @return array
     */
    public function rule(): array
    {
        return array_merge(parent::rules(),[
            [[self::ATTR_MODEL_INFO_FORM], 'each', 'rule' => ['safe']],
            [[self::ATTR_MODEL_INFO_FORM], 'each', 'rule' => ['safe']],
            [[self::ATTR_LIST_FIELD_FORM], 'each', 'rule' => ['class', FieldForm::class]],
            [[self::ATTR_LIST_FILE_FORM], 'each', 'rule' => ['class', FileFilterSettingsForm::class]],
        ]);
    }


    /**
     * @param string $attr
     *
     * @return string
     */
    public function getNameValue( string $attr ): string
    {
        return ($this->index === TableForm::NEW )
            ? sprintf( $this->naming[ CollectionTableInfo::ATTR_NEW_TABLE_INFO_FORM ], $attr )
            : sprintf( $this->naming[ CollectionTableInfo::ATTR_LIST_TABLE_INFO_FORMS ], $this->index, $attr );
    }
}