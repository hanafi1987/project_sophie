<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'timezone' => 'Asia/Kuala_Lumpur',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\models\Users',
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => [ 'login' ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                '' => 'dashboard/index',
                '<alias:index>' => 'dashboard/<alias>',
                '<alias:dashboard>' => 'dashboard/index',

                '<alias:banners>' => 'banners/<alias>',
                'GET,HEAD banners/<alias:add|edit|delete>' => 'banners/<alias>',
                'POST banners/<alias:add>' => 'banners/create',
                'POST banners/<alias:edit>' => 'banners/update',

                '<alias:supplier>' => 'supplier/<alias>',
                'GET,HEAD supplier/<alias:add|edit|delete>' => 'supplier/<alias>',
                'POST supplier/<alias:add>' => 'supplier/create',
                'POST supplier/<alias:edit>' => 'supplier/update',

                'products/<alias:categories>' => 'categories/<alias>',
                'GET,HEAD products/categories/<alias:add|edit|delete>' => 'categories/<alias>',
                'POST products/categories/<alias:add>' => 'categories/create',
                'POST products/categories/<alias:edit>' => 'categories/update',

                'configuration/shipping' => 'shipconf/index',
                'GET,HEAD configuration/shipping/<alias:add|edit|delete>' => 'shipconf/<alias>',
                'POST configuration/shipping/<alias:add>' => 'shipconf/create',
                'POST configuration/shipping/<alias:edit>' => 'shipconf/update',

                '<alias:promocode>' => 'promocode/<alias>',
                'GET,HEAD promocode/<alias:add|edit|delete>' => 'promocode/<alias>',
                'POST  promocode/<alias:add>' => 'promocode/create',
                'POST promocode/<alias:edit>' => 'promocode/update',

                '<alias:products>' => 'products/<alias>',
                'GET,HEAD products/<alias:add|edit|delete>' => 'products/<alias>',
                'POST  products/<alias:add>' => 'products/create',
                'POST products/<alias:edit>' => 'products/update',

                'POST products/image/feature/upload' => 'products/featureupload',
                'POST products/image/feature/preview/delete' => 'products/deletefeature',
                'GET products/image/feature/preview' => 'products/preview',

                '<alias:login|logout|register>' => 'access/<alias>',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],

            ],
        ],
        'i18n' => [
            'translations' => [
                'file-input*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => dirname(__FILE__).'/../vendor/2amigos/yii2-file-input-widget/src/messages/',
                ],
            ],
        ],

    ],
    'params' => $params,
];
