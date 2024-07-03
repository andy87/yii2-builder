<?php

namespace andy87\yii2\builder\components\models;



/**
 * Class `FileSettings`
 *
 * Settings for file generate
 *
 * @package andy87\yii2\builder\components\models
 */
class FileSettings
{
    public function __construct(
        public string $fileName,
        public string $dirFile,
        public string $template,
        public array $params = [],
    ){}
}