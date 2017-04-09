<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@bower/hermo_frontend/';
    public $css = [
        'css/app.css'

    ];
    public $js = [
        ['js'=>'js/libs.js', 'position' => \yii\web\View::POS_HEAD],
        'js/controller.js',
        'js/apps.js'
    ];
}
