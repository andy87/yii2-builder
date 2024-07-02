<?php

namespace andy87\yii2\builder\components;

/**
 * Class Builder
 *
 * @package andy87\yii2\architect\components
 */
class Builder extends \yii\gii\Generator
{
    public const ID = 'build';
    public const TEMPLATE = '@vendor/andy87/builder/templates/default';

    public function getName(): string
    {
        return 'Builder';
    }

    public function getDescription(): string
    {
        return 'Yii2 Builder - расширение для модуля Gii в фреймворке Yii2 упрощающее генерацию файлов';
    }

    public function generate(): string
    {
        return 'Hello, world!';
    }
}