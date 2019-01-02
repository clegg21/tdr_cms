<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_type".
 *
 * @property int $person_type_id
 * @property string $person_type
 *
 * @property Person[] $people
 */
class PersonType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_type_id', 'person_type'], 'required'],
            [['person_type_id'], 'default', 'value' => null],
            [['person_type_id'], 'integer'],
            [['person_type'], 'string', 'max' => 15],
            [['person_type_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'person_type_id' => 'Person Type ID',
            'person_type' => 'Person Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['person_type_id' => 'person_type_id']);
    }
}
