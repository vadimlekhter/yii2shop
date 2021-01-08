<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'notificationService' => [
            'class' => \common\services\NotificationService::class
        ],
        'emailService' => [
            'class' => \common\services\EmailService::class,
        ]
    ],
];
