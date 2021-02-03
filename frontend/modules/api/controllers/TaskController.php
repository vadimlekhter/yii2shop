<?php


namespace frontend\modules\api\controllers;


use common\models\Task;

class TaskController extends \yii\rest\ActiveController
{
    public $modelClass = Task::class;
}