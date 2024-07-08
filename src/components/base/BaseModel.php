<?php

namespace andy87\yii2\builder\components\base;

use yii\{ base\Model, bootstrap5\Html };

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
     * @param array $options
     *
     * @return string
     */
    public function constructInput( string $type, string $attr, array $options = []): string
    {
        $className = static::getClassName();

        $name = "name=\"{$className}[$attr]\"";

        $value = $this->{$attr} ?? null;

        $options = array_merge($options, [
            'class' => 'form-control',
        ]);

        return Html::input($type, $name, $value, $options );
    }

    /**
     * @param string $text
     * @param array $options
     *
     * @return string
     */
    public function constructActionButton(string $text, array $options = []): string
    {
        $className = static::getClassName();

        $options = array_merge($options, [
            'name' => "{$className}[action]"
        ]);

        return Html::button( $text, $options );
    }

    /**
     * @return string
     */
    protected static function getClassName(): string
    {
        if ( static::$className === null ) {
            $className = static::class;
            $className = get_class(new $className);
            $className = explode('\\', $className);
            static::$className = array_pop($className);
        }

        return static::$className;
    }
}