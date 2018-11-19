<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "relationship".
 *
 * @property int $relationship_id
 * @property int $student_id
 * @property int $parent_guardian_id
 *
 * @property Learner $student
 * @property ParentGuardian $parentGuardian
 */
class Relationship extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'relationship';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'parent_guardian_id'], 'required'],
            [['student_id', 'parent_guardian_id'], 'default', 'value' => null],
            [['student_id', 'parent_guardian_id'], 'integer'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Learner::className(), 'targetAttribute' => ['student_id' => 'learner_id']],
            [['parent_guardian_id'], 'exist', 'skipOnError' => true, 'targetClass' => ParentGuardian::className(), 'targetAttribute' => ['parent_guardian_id' => 'parent_guardian_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'relationship_id' => 'Relationship ID',
            'student_id' => 'Student ID',
            'parent_guardian_id' => 'Parent Guardian ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Learner::className(), ['learner_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentGuardian()
    {
        return $this->hasOne(ParentGuardian::className(), ['parent_guardian_id' => 'parent_guardian_id']);
    }
}
