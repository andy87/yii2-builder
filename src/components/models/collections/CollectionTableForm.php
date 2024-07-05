<?php

namespace andy87\yii2\builder\components\models\collections;

use yii\base\Model;
use andy87\yii2\builder\components\models\TableForm;

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
class CollectionTableForm extends Model
{
    public const ATTR_TABLE_FORMS = 'tableForms';

    /** @var TableForm[] */
    public array $tableForms = [];

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [ [ self::ATTR_TABLE_FORMS], 'each', 'rule' => [ 'class', TableForm::class ] ]
        ];
    }

    /**
     * Generate name like
     *
     * @param TableForm $tableForm
     * @param string $attr
     *
     * @return string
     */
    public static function attrName(TableForm $tableForm, string $attr ): string
    {
        return "CollectionTableForm[". self::ATTR_TABLE_FORMS ."][$tableForm->id][$attr]";
    }
}