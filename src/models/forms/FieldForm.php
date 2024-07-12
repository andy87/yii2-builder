<?php

namespace andy87\yii2\builder\models\forms;

use andy87\yii2\builder\components\traits\FormTrait;
use andy87\yii2\builder\models\settings\FieldSettings;
use andy87\yii2\builder\models\collections\CollectionTableInfo;

/**
 * Class GenerateFieldForm
 *
 * @package andy87\yii2\builder\models\forms
 */
class FieldForm extends FieldSettings
{
    use FormTrait;

    public const ATTR_NAME = 'name';
    public const ATTR_COMMENT = 'comment';
    public const ATTR_TYPE = 'type';
    public const ATTR_LENGTH = 'length';
    public const ATTR_NOT_NULL = 'notNull';
    public const ATTR_DEFAULT = 'default';
    public const ATTR_FOREIGN_KEY = 'foreignKey';
    public const ATTR_UNIQUE = 'unique';

    public const OPTIONS = [
        'string' => 'Строка (255)',
        'text' => 'Текст (255+)',
        'integer' => 'Число',
        'float' => 'Дробное число',
        'bool' => 'Логическое',
        'date' => 'Дата',
        'time' => 'Время',
        'dateTime' => 'Дата и время',
        'timestamp' => 'Метка времени',
        'json' => 'JSON',
    ];


    public string $index = TableForm::NEW;

    public array $naming = [
        CollectionTableInfo::ATTR_NEW_TABLE_INFO_FORM => 'TableInfoForm[listFieldForm][%s][%s]',
        CollectionTableInfo::ATTR_LIST_TABLE_INFO_FORMS =>  'CollectionTableInfo[listTableInfoForm][%s][listFieldForm][%s][%s]',
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


    /**
     * @param string $attr
     *
     * @return string
     */
    public function getNameValue( string $attr ): string
    {
        return ($this->index === TableForm::NEW )
            ? sprintf( $this->naming[ CollectionTableInfo::ATTR_NEW_TABLE_INFO_FORM ], $this->index, $attr )
            : sprintf( $this->naming[ CollectionTableInfo::ATTR_LIST_TABLE_INFO_FORMS ], $this->index, $this->name, $attr );
    }
}