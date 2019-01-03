<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_taught".
 *
 * @property int $subject_taught_id
 * @property int $instructor_id
 * @property int $subject_id
 *
 * @property Instructor $instructor
 * @property Subject $subject
 */
class SubjectTaught extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject_taught';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['instructor_id', 'subject_id'], 'required'],
            [['instructor_id', 'subject_id'], 'default', 'value' => null],
            [['instructor_id', 'subject_id'], 'integer'],
            [['instructor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instructor::className(), 'targetAttribute' => ['instructor_id' => 'instructor_id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'subject_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subject_taught_id' => 'Subject Taught ID',
            'instructor_id' => 'Instructor ID',
            'subject_id' => 'Subject ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstructor()
    {
        return $this->hasOne(Instructor::className(), ['instructor_id' => 'instructor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['subject_id' => 'subject_id']);
    }
}
