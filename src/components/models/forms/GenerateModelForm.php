<?php

namespace andy87\yii2\builder\components\models\forms;

use yii\base\Model;

/**
 * Class GenerateModelForm
 *
 * @package andy87\yii2\builder\components\models\forms
 */
class GenerateModelForm extends Model
{
    /** @var string Единчственное число */
    public string $singular;

    /** @var string Множественное число */
    public string $plural;
}