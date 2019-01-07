<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grouping".
 *
 * @property int $grouping_id
 * @property int $group_number
 * @property int $person_id
 * @property int $course_id
 *
 * @property Course $course
 * @property Person $person
 */
class Grouping extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grouping';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_number', 'person_id', 'course_id'], 'required'],
            [['group_number', 'person_id', 'course_id'], 'default', 'value' => null],
            [['group_number', 'person_id', 'course_id'], 'integer'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'course_id']],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'person_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'grouping_id' => 'Grouping ID',
            'group_number' => 'Group Number',
            'person_id' => 'Person',
            'course_id' => 'Course',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'person_id']);
    }
}
