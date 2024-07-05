<?php

namespace andy87\yii2\builder\components\models;

use yii\base\Model;

/**
 * Class `FieldForm`
 *
 * Table columns description
 *
 * @package andy87\yii2\builder\components\models
 */
class FieldForm extends Model
{
    public const ATTR_NAME = 'name';
    public const ATTR_COMMENT = 'comment';
    public const ATTR_TYPE = 'type';
    public const ATTR_LENGTH = 'length';
    public const ATTR_NOT_NULL = 'notNull';
    public const ATTR_DEFAULT = 'default';
    public const ATTR_FOREIGN_KEY = 'foreignKey';
    public const ATTR_UNIQUE = 'unique';
    public const ATTR_ACTION = 'action';

    public const ACTION_ADD = 'add';
    public const ACTION_UPDATE = 'update';
    public const ACTION_REMOVE = 'remove';


    public const TYPE_LIST = [
        'string' => 'Строка',
        'text' => 'Текст',
        'integer' => 'Число',
        'float' => 'Дробное число',
        'boolean' => 'Логическое',
        'date' => 'Дата',
        'time' => 'Время',
        'datetime' => 'Дата и время',
        'timestamp' => 'Метка времени',
    ];

    public const NEW = '0';

    public string $id = self::NEW;

    /** @var string Column name */
    public string $name = self::NEW;
    public ?string $comment = null;
    public ?string $type = null;
    public ?int $length = null;
    public ?string $default = null;
    public ?bool $notNull = null;
    public ?bool $unique = null;
    public ?bool $foreignKey = null;


    public function rules(): array
    {
        return [
            [['name', 'type'], 'required'],
            [['name', 'comment', 'type', 'default'], 'string'],
            [['length'], 'integer'],
            [['notNull', 'unique', 'foreignKey'], 'boolean'],
        ];
    }

    /**
     * @param $data
     * @param string $formName
     *
     * @return bool
     */
    public function load($data, $formName = ''): bool
    {
        $data['length'] = (isset($data['length'])) ? (int) $data['length'] : null;

        $load = parent::load($data, $formName);

        $this->id = $this->name ?? self::NEW;

        return $load;
    }
}