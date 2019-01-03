<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "learner".
 *
 * @property int $learner_id
 * @property int $course_id
 * @property string $start_date
 * @property string $end_date
 * @property int $qualification_id
 * @property int $status_id
 * @property int $company_id
 * @property int $locker_id
 *
 * @property Company $company
 * @property Course $course
 * @property Locker $locker
 * @property Person $learner
 * @property Qualification $qualification
 * @property Status $status0
 * @property Relationship[] $relationships
 */
class Learner extends \app\models\Person
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'learner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['learner_id', 'course_id', 'start_date', 'end_date', 'qualification_id', 'status_id', 'company_id', 'locker_id'], 'required'],
            [['learner_id', 'course_id', 'qualification_id', 'status_id', 'company_id', 'locker_id'], 'default', 'value' => null],
            [['learner_id', 'course_id', 'qualification_id', 'status_id', 'company_id', 'locker_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['learner_id'], 'unique'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['status_id' => 'company_id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'course_id']],
            [['locker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Locker::className(), 'targetAttribute' => ['locker_id' => 'locker_id']],
            [['learner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['learner_id' => 'person_id']],
            [['qualification_id'], 'exist', 'skipOnError' => true, 'targetClass' => Qualification::className(), 'targetAttribute' => ['qualification_id' => 'qualification_id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'status_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'learner_id' => 'Learner ID',
            'course_id' => 'Course',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'qualification_id' => 'Qualification',
            'status_id' => 'Status',
            'company_id' => 'Company',
            'locker_id' => 'Locker Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
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
    public function getLocker()
    {
        return $this->hasOne(Locker::className(), ['locker_id' => 'locker_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLearner()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'learner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQualification()
    {
        return $this->hasOne(Qualification::className(), ['qualification_id' => 'qualification_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['status_id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationships()
    {
        return $this->hasMany(Relationship::className(), ['student_id' => 'learner_id']);
    }
}
