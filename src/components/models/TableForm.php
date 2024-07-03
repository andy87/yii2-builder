<?php

namespace andy87\yii2\builder\components\models;

use yii\base\Model;

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
class TableForm extends Model
{
    public const ATTR_ACTION = 'action';
    public const ATTR_ID = 'id';

    /** @var string Attribute `name` */
    public const ATTR_NAME = 'tableName';

    public const ATTR_SINGLE = 'rusSingular';
    public const ATTR_PLURAL = 'rusPlural';
    public const ATTR_FIELDS = 'fields';
    public const ATTR_FILES = 'files';

    public const ACTION_ADD = 'add';
    public const ACTION_UPDATE = 'update';
    public const ACTION_REMOVE = 'remove';

    public const NEW = '0';

    public string $id = self::NEW;


    /** @var ?string Действие */
    public ?string $action = null;


    /** @var ?string Название таблицы */
    public ?string $tableName = null;

    /** @var ?string Единственное число */
    public ?string $rusSingular = null;

    /** @var ?string Множественное число */
    public ?string $rusPlural = null;


    /** @var FieldForm[] */
    public array $fields = [];

    /** @var FileForm[] */
    public array $files = [];


    public function init(): void
    {
        parent::init();

        $this->id = self::NEW;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [ [ self::ATTR_FILES, self::ATTR_FILES], 'safe' ],
            [ [ self::ATTR_NAME, self::ATTR_ACTION, self::ATTR_ID ], 'required' ],
            [ [ self::ATTR_NAME, self::ATTR_ACTION, self::ATTR_SINGLE, self::ATTR_PLURAL ], 'string' ],
        ];
    }

    /**
     * @param $data
     * @param string $formName
     *
     * @return bool
     */
    public function load($data, $formName = null): bool
    {
        if ( $load = parent::load($data, $formName) ) {
            $this->id = $this->tableName;
        }

        return $load;
    }

    /**
     * @return string[]
     */
    public function attributeLabels(): array
    {
        return [
            self::ATTR_NAME => 'Название таблицы',
            self::ATTR_SINGLE => 'Единственное число',
            self::ATTR_PLURAL => 'Множественное число',
        ];
    }
}