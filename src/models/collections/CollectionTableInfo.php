<?php

namespace andy87\yii2\builder\models\collections;

use andy87\yii2\builder\models\forms\TableForm;

/**
 * Class CollectionGenerateTableForm
 *
 * @package andy87\yii2\builder\models\collections
 */
class CollectionTableInfo
{
    public const ATTR_NEW_TABLE_INFO_FORM = 'newTableInfoForm';

    public const ATTR_LIST_TABLE_INFO_FORMS = 'listTableInfoForms';



    /** @var TableForm  */
    public TableForm $newTableInfoForm;

    /** @var TableForm[]  */
    public array $listTableInfoForms = [];


    /**
     * CollectionGenerateTableForm constructor.
     */
    public function __construct()
    {
        $this->newTableInfoForm = new TableForm();
    }


    /**
     * @return array[]
     */
    public function rule(): array
    {
        return [
            [[self::ATTR_NEW_TABLE_INFO_FORM], 'safe'],
            [[self::ATTR_LIST_TABLE_INFO_FORMS], 'each', 'rule' => ['class', TableForm::class]],
        ];
    }
}