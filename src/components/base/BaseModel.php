<?php

namespace andy87\yii2\builder\components\base;

use yii\base\Model;
use yii\bootstrap5\Html;

/**
 * Class BaseModel
 *
 * @package andy87\yii2\builder\components\base
 */
class BaseModel extends Model
{
    /** @var ?string  */
    public static ?string $className = null;

    /**
     * @param string $type
     * @param string $attr
     * @param array $values
     *
     * @return string
     */
    public static function constructInput( string $type, string $attr, array $values): string
    {
        $className = self::getClassName();

        $name = "name=\"{$className}[$attr]\"";

        return Html::input($type, $name, ($values[$attr] ?? null), [
            'class' => 'form-control',
        ]);
    }

    /**
     * @param string $text
     * @param array $options
     * @return string
     */
    public static function constructActionButton(string $text, array $options): string
    {
        $className = self::getClassName();

        $options = array_merge($options, [
            'name' => "{$className}[action]"
        ]);

        return Html::button($text, $options );
    }

    /**
     * @return string
     */
    private static function getClassName(): string
    {
        if ( self::$className === null ) {
            $className = self::class;
            $className = get_class(new $className);
            $className = explode('\\', $className);
            self::$className = array_pop($className);
        }

        return self::$className;
    }
}