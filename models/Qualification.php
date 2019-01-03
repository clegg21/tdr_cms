<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qualification".
 *
 * @property int $qualification_id
 * @property string $qualification_name
 *
 * @property Learner[] $learners
 */
class Qualification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qualification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qualification_name'], 'required'],
            [['qualification_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'qualification_id' => 'Qualification ID',
            'qualification_name' => 'Qualification Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLearners()
    {
        return $this->hasMany(Learner::className(), ['qualification_id' => 'qualification_id']);
    }
}
