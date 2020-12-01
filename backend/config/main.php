<?php

$params = array_merge(
        require __DIR__ . '/../../common/config/params.php',
        require __DIR__ . '/../../common/config/params-local.php',
        require __DIR__ . '/params.php',
        require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
        'language' => 'ru',
    'modules' => [
        
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['*']
        ],
        'user' => [
            'class' => 'backend\modules\user\Module',
        ],
        'employee' => [
            'class' => 'backend\modules\employee\Module',
        ],
        'product' => [
            'class' => 'backend\modules\product\Module',
        ],
        'provider' => [
            'class' => 'backend\modules\provider\Module',
        ],
        'arrivalOfGoods' => [
            'class' => 'backend\modules\arrivalOfGoods\Module',
        ],
        'consumptionOfGoods' => [
            'class' => 'backend\modules\consumptionOfGoods\Module',
        ],
        'recipients' => [
            'class' => 'backend\modules\recipients\Module',
        ],
        'arrivaOfGoodsAddition' => [
            'class' => 'backend\modules\arrivaOfGoodsAddition\Module',
        ],
                'consumptionOfGoodsAddition' => [
            'class' => 'backend\modules\consumptionOfGoodsAddition\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
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
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];
