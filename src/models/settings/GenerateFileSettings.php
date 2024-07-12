<?php

namespace andy87\yii2\builder\models\settings;

/**
 * Class `FileSettings`
 *
 * Settings for file generate
 *
 * @package andy87\yii2\builder\components\models
 */
class GenerateFileSettings
{
    public function __construct(
        public string $template,
        public array $params = [],
    ){}
}