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
            [['event_id', 'description'], 'required'],
            [['event_id'], 'default', 'value' => null],
            [['event_id'], 'integer'],
            [['description'], 'string', 'max' => 250],
            [['event_id'], 'unique'],
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
