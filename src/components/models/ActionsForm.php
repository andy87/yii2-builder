<?php

namespace andy87\yii2\builder\components\models;

/**
 * Class `Actions`
 *
 * @package andy87\yii2\builder\components\models
 */
class ActionsForm extends \yii\base\Model
{
    public ?string $remove = null;

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['remove'], 'string']
        ];
    }
}