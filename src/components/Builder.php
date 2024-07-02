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

    public const VIEWS = '@vendor/andy87/yii2-builder/src/views';

    public const TEMPLATES = '@vendor/andy87/yii2-builder/src/templates';

    public const CACHE = '@app/runtime/builder-cache/';



    public function init(): void
    {
        parent::init();
    }


    public function formView(): string
    {
        return self::VIEWS . '/form.php';
    }

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