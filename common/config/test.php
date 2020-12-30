<?php
return \yii\helpers\ArrayHelper::merge(
    (require __DIR__ . '/test.php'),
    [
        'components' => [
            'class' => '\yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii_shop_test',
            'username' => 'root',
            'password' => 'root'
        ]
    ]
);