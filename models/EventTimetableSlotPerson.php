<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_timetable_slot_person".
 *
 * @property int $event_timetable_slot_person_id
 * @property int $person_id
 * @property int $event_id
 * @property int $timetable_slot_id
 * @property bool $in_attendance
 *
 * @property Event $event
 * @property Person $person
 * @property TimetableSlot $timetableSlot
 */
class EventTimetableSlotPerson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_timetable_slot_person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id', 'event_id', 'timetable_slot_id', 'in_attendance'], 'required'],
            [['person_id', 'event_id', 'timetable_slot_id'], 'default', 'value' => null],
            [['person_id', 'event_id', 'timetable_slot_id'], 'integer'],
            [['in_attendance'], 'boolean'],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'event_id']],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'person_id']],
            [['timetable_slot_id'], 'exist', 'skipOnError' => true, 'targetClass' => TimetableSlot::className(), 'targetAttribute' => ['timetable_slot_id' => 'timetable_slot_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_timetable_slot_person_id' => 'Event Timetable Slot Person ID',
            'person_id' => 'Person ID',
            'event_id' => 'Event ID',
            'timetable_slot_id' => 'Timetable Slot ID',
            'in_attendance' => 'In Attendance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['event_id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetableSlot()
    {
        return $this->hasOne(TimetableSlot::className(), ['timetable_slot_id' => 'timetable_slot_id']);
    }
}
