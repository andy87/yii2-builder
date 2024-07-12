<?php

namespace andy87\yii2\builder\assets;

use yii\web\{ JqueryAsset, AssetBundle };

/**
 * Class `BuilderAsset`
 *
 * @package andy87\yii2\builder\components\assets
 */
class JqueryUIAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/../static';

    public $css = [];

    public $js = [
        'js/jquery-ui.js',
    ];

    public $depends = [
        JqueryAsset::class,
    ];
}