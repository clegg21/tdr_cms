<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timetable_slot".
 *
 * @property int $timetable_slot_id
 * @property string $start_date
 * @property string $end_date
 * @property int $location_id
 *
 * @property EventTimetableSlotPerson[] $eventTimetableSlotPeople
 * @property Location $location
 * @property TimetableSlotOnModule[] $timetableSlotOnModules
 */
class TimetableSlot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timetable_slot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date', 'location_id'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['location_id'], 'default', 'value' => null],
            [['location_id'], 'integer'],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'location_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'timetable_slot_id' => 'Timetable Slot ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'location_id' => 'Location ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTimetableSlotPeople()
    {
        return $this->hasMany(EventTimetableSlotPerson::className(), ['timetable_slot_id' => 'timetable_slot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['location_id' => 'location_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetableSlotOnModules()
    {
        return $this->hasMany(TimetableSlotOnModule::className(), ['timetable_slot_id' => 'timetable_slot_id']);
    }
}
