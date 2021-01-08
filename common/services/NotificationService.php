<?php


namespace common\services;

use yii\base\Component;
use yii\web\UserEvent;

class NotificationService extends Component
{
    public function emailUserLogin(UserEvent $event)
    {
        $username = $event->identity->username;
        \Yii::$app->emailService->send(\Yii::$app->params['adminEmail'], 'User login',
            ['username' => $username], ['html' => 'emailUserLogin-html', 'text' => 'emailUserLogin-text']);
    }

    public function emailUserLogout(UserEvent $event)
    {
        $username = $event->identity->username;
        \Yii::$app->emailService->send(\Yii::$app->params['adminEmail'], 'User logout',
            ['username' => $username], ['html' => 'emailUserLogout-html', 'text' => 'emailUserLogout-text']);
    }
}