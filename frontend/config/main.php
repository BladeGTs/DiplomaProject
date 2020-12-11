<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
   // 'language' => 'en-US',
    'language' => 'ru-RU',
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'user' => [
            'class' => 'frontend\modules\user\Module',
        ],
        'consumptionOfGoods' => [
          'class' => 'frontend\modules\consumptionOfGoods\Module',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'enableCsrfValidation' => true,
        ],
        'user' => [
            'class' => promocat\twofa\User::class,
            'identityClass' => frontend\models\User::class,
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        
        'twoFa' => [
            'class' => promocat\twofa\TwoFa::class
        ],
        
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        
//        'errorHandler' => [
//            'errorAction' => 'site/error',
//        ],
                'errorHandler' => [
            'errorAction' => 'site/fault',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'news' => 'test/index',
                'news/<id:\d+>'=>'test/view',
                'about-me'=>'site/about',
                'profile/<nickname:\w+>'=>'user/profile/view',
                'login/' => '/user/default/login',
                'signup' => '/user/default/signup',
            ],
        ],

        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => 'facebook_client_id',
                    'clientSecret' => 'facebook_client_secret',
                ],
                // etc.
            ],
        ],
        // ...

        'stringHelper' => [
            'class' =>'frontend\components\StringHelper',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource'
                ],
            ],
        ],
 
        
//'mailer' => [
//    'class' => 'yii\swiftmailer\Mailer',
//    'useFileTransport' => false,
//    'transport' => [
//        'class' => 'Swift_SmtpTransport',
//        'host' => 'smtp.gmail.com',
//        'username' => '',
//        'password' => '',
//        'port' => '587',
//        'encryption' => 'tls',
//    ],
//],
    ],
    'params' => $params,
   
    
];
