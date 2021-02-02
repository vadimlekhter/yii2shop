<?php


namespace common\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 *Task model
 *
 * @property integer $id
 * @property string $task
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property User $creator
 * @property User $updater
 */
class Task extends ActiveRecord
{
    protected $classUser = User::class;

    const RELATION_CREATOR = 'creator';
    const RELATION_UPDATER = 'updater';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%task}}';
    }

    public function rules()
    {
        return [
            [['task'], 'string', 'required'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => $this->classUser, 'targetAttribute' => ['created_by' => 'id']],
            [['created_at'], 'exist', 'skipOnError' => true, 'targetClass' => $this->classUser, 'targetAttribute' => ['updated_by' => 'id']],
            [['created_at', 'updated_at'], 'integer', 'required'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'creator_id',
                'updatedByAttribute' => 'updater_id'
            ]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne($this->classUser, ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne($this->classUser, ['id' => 'updated_by']);
    }
}