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
    /** @var array */
    public static array $className = [];



    /**
     * @param string $type
     * @param string $attr
     * @param array $options
     *
     * @return string
     */
    public function constructInput( string $type, string $attr, array $options = []): string
    {
        $className = $this->getClassName(static::class);

        $name = "{$className}[$attr]";

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
        $className = $this->getClassName(static::class);

        $options = array_merge($options, [
            'name' => "{$className}[action]"
        ]);

        return Html::button( $text, $options );
    }

    /**
     * @param string $class
     *
     * @return string
     */
    protected function getClassName( string $class ): string
    {
        if ( !isset(self::$className[$class]) ) {
            $className = explode('\\', $class);
            self::$className[$class] = array_pop($className);
        }

        return self::$className[$class];
    }
}