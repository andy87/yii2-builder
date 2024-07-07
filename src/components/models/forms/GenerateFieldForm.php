<?php

namespace andy87\yii2\builder\components\models\forms;

use yii\base\Model;

/**
 * Class GenerateFieldForm
 *
 * @package andy87\yii2\builder\components\models\forms
 */
class GenerateFieldForm extends Model
{
    public const ATTR_NAME = 'name';
    public const ATTR_COMMENT = 'comment';
    public const ATTR_TYPE = 'type';
    public const ATTR_LENGTH = 'length';
    public const ATTR_NOT_NULL = 'notNull';
    public const ATTR_DEFAULT = 'default';
    public const ATTR_FOREIGN_KEY = 'foreignKey';
    public const ATTR_UNIQUE = 'unique';


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


    /** @var string Column name */
    public string $name;
    public ?string $comment = null;
    public ?string $type = null;
    public ?int $length = null;
    public ?string $default = null;
    public ?bool $notNull = null;
    public ?bool $unique = null;
    public ?bool $foreignKey = null;



    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [[self::ATTR_NAME, self::ATTR_TYPE], 'required'],
            [[self::ATTR_NAME, self::ATTR_COMMENT, self::ATTR_TYPE, self::ATTR_DEFAULT], 'string'],
            [[self::ATTR_LENGTH], 'integer'],
            [[self::ATTR_NOT_NULL, self::ATTR_UNIQUE, self::ATTR_FOREIGN_KEY], 'boolean'],
        ];
    }
}