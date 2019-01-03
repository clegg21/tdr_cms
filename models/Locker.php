<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locker".
 *
 * @property int $locker_id
 * @property string $locker_number
 *
 * @property Learner[] $learners
 */
class Locker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['locker_number'], 'required'],
            [['locker_number'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'locker_id' => 'Locker ID',
            'locker_number' => 'Locker Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLearners()
    {
        return $this->hasMany(Learner::className(), ['locker_id' => 'locker_id']);
    }
}
