<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $course_id
 * @property string $description
 * @property int $subject_id
 *
 * @property Subject $subject
 * @property Grouping[] $groupings
 * @property Learner[] $learners
 * @property ModuleOnCourse[] $moduleOnCourses
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'subject_id'], 'required'],
            [['subject_id'], 'default', 'value' => null],
            [['subject_id'], 'integer'],
            [['description'], 'string', 'max' => 250],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'subject_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'description' => 'Description',
            'subject_id' => 'Subject ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['subject_id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupings()
    {
        return $this->hasMany(Grouping::className(), ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLearners()
    {
        return $this->hasMany(Learner::className(), ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModuleOnCourses()
    {
        return $this->hasMany(ModuleOnCourse::className(), ['course_id' => 'course_id']);
    }
}
