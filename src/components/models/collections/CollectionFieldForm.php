<?php

namespace andy87\yii2\builder\components\models\collections;

use andy87\yii2\builder\components\models\TableForm;
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
    public const ATTR_FIELDS_FORMS = 'fieldForms';

    /** @var FieldForm[] */
    public array $fieldForms = [];

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [ [ self::ATTR_FIELDS_FORMS], 'each', 'rule' => [ 'class', FieldForm::class ] ]
        ];
    }

    /**
     * @param TableForm $tableForm
     * @param string $attr
     * @param ?FieldForm $fieldForm
     *
     * @return string
     */
    public static function attrName(TableForm $tableForm, string $attr, ?FieldForm $fieldForm = null ): string
    {
        $id = ($fieldForm) ? $fieldForm->id : FieldForm::NEW;

        return "CollectionTableForm[tableForms][$tableForm->id][collectionFieldForm][$id][$attr]";
    }
}