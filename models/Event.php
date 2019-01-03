<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $event_id
 * @property string $description
 *
 * @property EventTimetableSlotPerson[] $eventTimetableSlotPeople
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_id' => 'Event ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTimetableSlotPeople()
    {
        return $this->hasMany(EventTimetableSlotPerson::className(), ['event_id' => 'event_id']);
    }
}
