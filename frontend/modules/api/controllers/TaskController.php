<?php


namespace frontend\modules\api\controllers;


use common\models\Task;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\Cors;

class TaskController extends \yii\rest\ActiveController
{
    public $modelClass = Task::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // remove authentication filter

        $auth = $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBasicAuth::class,
                HttpBearerAuth::class,
                QueryParamAuth::class,
            ]
        ];


//        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);

        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => Cors::class,
        ];

        // re-add authentication filter
        $behaviors['authenticator'] = $auth;
        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];

        return $behaviors;
    }

    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs['index'][] = 'OPTIONS'; //just add the 'POST' to "GET" and "HEAD"
        return $verbs;
    }
}
