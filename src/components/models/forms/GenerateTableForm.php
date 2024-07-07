<?php

namespace andy87\yii2\builder\components\models\forms;

use andy87\yii2\builder\components\models\settings\GenerateTableSetting;

/**
 * Class GenerateTableForm
 *
 * @package andy87\yii2\builder\components\models\forms
 */
class GenerateTableForm extends GenerateTableSetting
{
    public const ID_NEW = '0';

    public const ATTR_GENERATE_MODEL_FORM = 'generateModelForm';

    public const ATTR_GENERATE_FIELD_FORM = 'listGenerateFieldForm';

    public const ATTR_GENERATE_FILE_FORM = 'listGenerateFileForm';


        /** @var string  */
    public string $id = self::ID_NEW;



    /** @var GenerateModelForm */
    public GenerateModelForm $generateModelForm;

    /** @var GenerateFieldForm[] */
    public array $listGenerateFieldForm = [];

    /** @var GenerateFileForm[] */
    public array $listGenerateFileForm = [];



    /**
     * @return void
     */
    public function init(): void
    {
        parent::init();

        $this->id = self::ID_NEW;

        $this->generateModelForm = new GenerateModelForm;
    }

    /**
     * @return array
     */
    public function rule(): array
    {
        return array_merge(parent::rules(),[
            [[self::ATTR_GENERATE_MODEL_FORM], 'each', 'rule' => ['safe']],
            [[self::ATTR_GENERATE_FIELD_FORM], 'each', 'rule' => ['class', GenerateFieldForm::class]],
            [[self::ATTR_GENERATE_FILE_FORM], 'each', 'rule' => ['class', GenerateFileForm::class]],
        ]);
    }

    /**
     * @param $data
     * @param $formName
     *
     * @return bool
     */
    public function load($data, $formName = null): bool
    {
        if ($load = parent::load($data, $formName))
        {
            $this->id = $this->tableName;
        }

        return $load;
    }
}