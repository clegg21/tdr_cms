<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instructor".
 *
 * @property int $instructor_id
 * @property int $subject_taught
 *
 * @property Person $instructor
 * @property SubjectTaught[] $subjectTaughts
 */
class Instructor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'instructor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['instructor_id', 'subject_taught'], 'required'],
            [['instructor_id', 'subject_taught'], 'default', 'value' => null],
            [['instructor_id', 'subject_taught'], 'integer'],
            [['instructor_id'], 'unique'],
            [['instructor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['instructor_id' => 'person_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'instructor_id' => 'Instructor ID',
            'subject_taught' => 'Subject Taught',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstructor()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'instructor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectTaughts()
    {
        return $this->hasMany(SubjectTaught::className(), ['instructor_id' => 'instructor_id']);
    }
}
