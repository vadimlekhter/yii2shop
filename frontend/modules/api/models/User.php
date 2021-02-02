<?php

namespace frontend\modules\api\models;

use common\models\User as UserRecord;

class User extends UserRecord
{
    public function fields()
    {
        return [
            'id',
            'username',
            'email'
        ];
    }

}