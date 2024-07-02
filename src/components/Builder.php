<?php

namespace andy87\yii2\architect\components;

/**
 * Class Builder
 *
 * @package andy87\yii2\architect\components
 */
class Builder extends \yii\gii\Generator
{
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