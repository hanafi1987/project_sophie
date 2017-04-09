<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminAsset extends AssetBundle
{
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';
    public $sourcePath = '@bower/hermo/';
    public $css = [
        'apps/css/apps.css'

    ];
    public $js = [
        'apps/scripts/default.js',
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );


}
