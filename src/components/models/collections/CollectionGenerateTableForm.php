<?php

namespace andy87\yii2\builder\components\models\collections;

use andy87\yii2\builder\components\models\forms\GenerateTableForm;

/**
 * Class CollectionGenerateTableForm
 *
 * @package andy87\yii2\builder\components\models\collections
 */
class CollectionGenerateTableForm
{
    public const ATTR_GENERATE_TABLE_FORM = 'generateTableForm';

    public const ATTR_LIST_GENERATE_TABLE_FORM = 'listGenerateTableForm';



    /** @var GenerateTableForm */
    public GenerateTableForm $generateTableForm;

    /** @var GenerateTableForm[]  */
    public array $listGenerateTableForm = [];



    /**
     * @return array[]
     */
    public function rule(): array
    {
        return [
            [[self::ATTR_GENERATE_TABLE_FORM], 'safe'],

            [[self::ATTR_LIST_GENERATE_TABLE_FORM], 'each', 'rule' => ['class', GenerateTableForm::class]],
        ];
    }
}