<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $subject_id
 * @property string $subject_name
 *
 * @property Course[] $courses
 * @property SubjectTaught[] $subjectTaughts
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_name'], 'required'],
            [['subject_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => 'Subject ID',
            'subject_name' => 'Subject Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['subject_id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectTaughts()
    {
        return $this->hasMany(SubjectTaught::className(), ['subject_id' => 'subject_id']);
    }
}
