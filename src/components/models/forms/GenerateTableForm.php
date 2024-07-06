<?php

namespace andy87\yii2\builder\components\models\forms;

use yii\base\Model;

/**
 * Class GenerateTableForm
 *
 * @package andy87\yii2\builder\components\models\forms
 */
class GenerateTableForm extends Model
{
    /** @var string */
    public string $tableName;

    /** @var string */
    public string $tableComment;

    /** @var GenerateModelForm */
    public GenerateModelForm $generateModelForm;

    /** @var GenerateFieldForm[] */
    public array $generateFieldForm;

    /** @var GenerateFileForm[] */
    public array $generateFileForm;


    /**
     * @return void
     */
    public function init(): void
    {
        parent::init();

        $this->generateModelForm = new GenerateModelForm();
    }
    /**
     * @return array
     */
    public function rule(): array
    {
        return [
            [['tableName'], 'required'],
            [['tableName', 'tableComment'], 'string'],
            [['generateModelForm'], 'each', 'rule' => ['safe']],
            [['generateFieldForm'], 'each', 'rule' => ['class', GenerateFieldForm::class]],
            [['generateFileForm'], 'each', 'rule' => ['class', GenerateFileForm::class]],
        ];
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
            $this->generateModelForm->load($data);
        }

        return $load;
    }

    private function prepareFieldForm($data): void
    {
        $arrayGenerateFieldForm = $data['generateFieldForm'] ?? [];

        foreach ($arrayGenerateFieldForm as $key => $params)
        {
            $this->generateFieldForm[$key] = new GenerateFieldForm();
            $this->generateFieldForm[$key]->load($params);
        }
    }

    private function prepareFileForm($data): void
    {
        $arrayGenerateFileForm = $data['generateFileForm'] ?? [];

        foreach ($arrayGenerateFileForm as $key => $params)
        {
            $this->generateFileForm[$key] = new GenerateFileForm();
            $this->generateFileForm[$key]->load($params);
        }
    }
}