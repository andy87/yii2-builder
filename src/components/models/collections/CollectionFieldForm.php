<?php

namespace andy87\yii2\builder\components\models\collections;

use yii\base\Model;
use andy87\yii2\builder\components\models\FieldForm;

/**
 * Class `TableForm`
 *
 * Table generate description
 *
 * @property string $id
 * @property string $action
 * @property string $tableName
 * @property string $tableComment
 * @property string $rusSingular
 * @property string $rusPlural
 *
 * @package andy87\yii2\builder\components\models
 */
class CollectionFieldForm extends Model
{
    public const ATTR_GROUPS = 'groups';

    /** @var FieldForm[] */
    public array $groups = [];

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [ [ self::ATTR_GROUPS], 'each', 'rule' => [ 'class', FieldForm::class ] ]
        ];
    }

    /**
     * Generate name like
     *
     * @param FieldForm $fieldForm
     * @param string $attr
     *
     * @return string
     */
    public static function attrName(FieldForm $fieldForm, string $attr ): string
    {
        return "CollectionTableForm[groups][$fieldForm->name][$attr]";
    }
}