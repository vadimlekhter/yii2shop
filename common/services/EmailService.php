<?php


namespace common\services;

use yii\base\Component;

class EmailService extends Component
{
    public function send($to, $subject, $data, $views)
    {
        if (\Yii::$app->mailer->compose(
            $views,
            $data
        )
            ->setTo($to)
            ->setSubject($subject)
            ->send()) {
            return true;
        }
        return false;
    }
}