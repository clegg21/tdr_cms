<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $status_id
 * @property string $status_description
 *
 * @property Learner[] $learners
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_description'], 'required'],
            [['status_description'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'status_description' => 'Status Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLearners()
    {
        return $this->hasMany(Learner::className(), ['status_id' => 'status_id']);
    }
}
