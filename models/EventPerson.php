<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_person".
 *
 * @property int $event_person_id
 * @property int $person_id
 * @property int $event_id
 * @property bool $in_attendance
 *
 * @property Event $event
 * @property Person $person
 */
class EventPerson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id', 'event_id', 'in_attendance'], 'required'],
            [['person_id', 'event_id'], 'default', 'value' => null],
            [['person_id', 'event_id'], 'integer'],
            [['in_attendance'], 'boolean'],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'event_id']],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'person_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_person_id' => 'Event Person ID',
            'person_id' => 'Person ID',
            'event_id' => 'Event ID',
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
}
