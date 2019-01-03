<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parent_guardian".
 *
 * @property int $parent_guardian_id
 * @property string $relationship_to_student
 *
 * @property Person $parentGuardian
 * @property Relationship[] $relationships
 */
class ParentGuardian extends \app\models\Person
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parent_guardian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_guardian_id', 'relationship_to_student'], 'required'],
            [['parent_guardian_id'], 'default', 'value' => null],
            [['parent_guardian_id'], 'integer'],
            [['relationship_to_student'], 'string', 'max' => 15],
            [['parent_guardian_id'], 'unique'],
            [['parent_guardian_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['parent_guardian_id' => 'person_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'parent_guardian_id' => 'Parent Guardian ID',
            'relationship_to_student' => 'Relationship To Student',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentGuardian()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'parent_guardian_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationships()
    {
        return $this->hasMany(Relationship::className(), ['parent_guardian_id' => 'parent_guardian_id']);
    }
}
