<?php

namespace andy87\yii2\builder\components\models\collections;

use andy87\yii2\builder\components\models\forms\GenerateTableForm;
use andy87\yii2\builder\components\models\settings\GenerateTableSetting;

/**
 * Class CollectionGenerateTableForm
 *
 * @package andy87\yii2\builder\components\models\collections
 */
class CollectionGenerateTableSettings
{
    public const ATTR_GENERATE_TABLE_FORM = 'listGenerateTableForm';

    /** @var GenerateTableSetting[]  */
    public array $listGenerateTableSetting = [];



    /**
     * @return array[]
     */
    public function rule(): array
    {
        return [
            [[self::ATTR_GENERATE_TABLE_FORM], 'each', 'rule' => ['class', GenerateTableSetting::class]],
        ];
    }
}