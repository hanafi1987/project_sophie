<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@bower/hermo/';
    public $css = [
        'apps/css/apps-login.css'
    ];
    public $js = [
        'apps/scripts/login.js',
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );

}
