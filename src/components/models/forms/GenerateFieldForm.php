<?php

namespace andy87\yii2\builder\components\models\forms;

use yii\bootstrap5\Html;
use andy87\yii2\builder\components\models\settings\GenerateFieldSetting;

/**
 * Class GenerateFieldForm
 *
 * @package andy87\yii2\builder\components\models\forms
 */
class GenerateFieldForm extends GenerateFieldSetting
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


    public GenerateTableForm $generateTableForm;


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
     * @param string $naming
     * @param bool $isOnlyValue
     *
     * @return string
     */
    public function attrName(string $attr, string $naming = 'name', bool $isOnlyValue = true): string
    {
        $className = static::getClassName();

        $index = $this->generateTableForm->id;

        $value = "{$className}[$index][$attr]";

        return $isOnlyValue ? $value : "$naming=\"$value\"";
    }

    /**
     * @param string $type
     * @param string $attr
     * @param string $ext
     * @param string $naming
     *
     * @return string
     */
    public function input( string $type, string $attr, string $naming = 'name', string $ext = '' ): string
    {
        $options = ($ext) ? ["$ext" => true] : [];

        $options = array_merge($options, [
            'class' => 'form-control form-control-sm',
        ]);

        $name = static::attrName($attr, $naming);

        if ( $naming !== 'name'  )
        {
            $options[$naming] = $name;
            $name = null;
        }

        $value = $this->{$attr} ?? null;

        return Html::input($type, $name, $value, $options );
    }

    /**
     * @param string $attr
     * @param string $naming
     *
     * @return string
     */
    public function checkbox( string $attr, string $naming = 'name'): string
    {
        $name = static::attrName($attr, $naming);

        if ( $naming !== 'name'  )
        {
            $options[$naming] = $name;
            $name = null;
        }

        $value = $this->{$attr} ?? null;

        $options = [
            'class' => 'input-group-text',
        ];

        return Html::checkbox($name, $value, $options );
    }
}