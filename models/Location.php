<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $location_id
 * @property string $description
 *
 * @property TimetableSlot[] $timetableSlots
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['location_id', 'description'], 'required'],
            [['location_id'], 'default', 'value' => null],
            [['location_id'], 'integer'],
            [['description'], 'string', 'max' => 250],
            [['location_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'location_id' => 'Location ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetableSlots()
    {
        return $this->hasMany(TimetableSlot::className(), ['location_id' => 'location_id']);
    }
}
