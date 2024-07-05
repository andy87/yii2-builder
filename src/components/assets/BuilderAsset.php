<?php

namespace andy87\yii2\builder\components\assets;

use yii\web\AssetBundle;

/**
 * Class `BuilderAsset`
 *
 * @package andy87\yii2\builder\components\assets
 */
class BuilderAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/../../static';

    public $css = [
        'css/builder.css',
    ];

    public $js = [
        'js/builder.js',
    ];

    public $depends = [
        \yii\web\YiiAsset::class,
        \yii\bootstrap5\BootstrapAsset::class,
    ];
}