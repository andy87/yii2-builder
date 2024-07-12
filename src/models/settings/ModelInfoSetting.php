<?php

namespace andy87\yii2\builder\models\settings;

use andy87\yii2\builder\components\base\BaseModel;

/**
 * Class GenerateTableSetting
 *
 * @package andy87\yii2\builder\models\settings
 */
class ModelInfoSetting extends BaseModel
{

    /** @var string Единчственное число */
    public string $singular;

    /** @var string Множественное число */
    public string $plural;

}