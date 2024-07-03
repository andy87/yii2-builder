<?php

namespace andy87\yii2\builder\components\models\collections;

use yii\base\Model;
use andy87\yii2\builder\components\models\FileForm;

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
class CollectionFileForm extends Model
{
    /** @var string  */
    public const ATTR_GROUPS = 'groups';

    /** @var FileForm[] */
    public array $groups = [];

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [ [ self::ATTR_GROUPS], 'each', 'rule' => [ 'class', FileForm::class ] ]
        ];
    }

    /**
     * Generate name like
     *
     * @param FileForm $fileForms
     * @param string $attr
     *
     * @return string
     */
    public static function attrName(FileForm $fileForms, string $attr ): string
    {
        return "CollectionTableForm[groups][$fileForms->id][$attr]";
    }
}