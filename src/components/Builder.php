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
        return 'Мой crud-генератор. Такой же как и дефолтный, но зато мой...';
    }

    public function generate(): string
    {
        return 'Hello, world!';
    }
}