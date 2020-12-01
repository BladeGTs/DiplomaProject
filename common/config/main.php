<?php

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'storage' => [
            'class' => 'common\components\Storage',
        ],
        'emailService' => [
            'class' => 'common\components\EmailService',
        ],
                'reCaptcha' => [
        'name' => 'reCaptcha',
        'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
        'siteKey' => '6LdG5J0UAAAAAGNd4f9-X_bKMO2rQlEBRSDiG1iG',
        'secret' => '6LdG5J0UAAAAAEwUVpcR4svtB5jmhnn-MlL8qCEF',
    ],
    ],
];
