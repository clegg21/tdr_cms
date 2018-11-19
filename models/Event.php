<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $event_id
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property int $location_id
 *
 * @property Location $location
 * @property EventOnModule[] $eventOnModules
 * @property EventPerson[] $eventPeople
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
            [['description', 'start_date', 'end_date', 'location_id'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['location_id'], 'default', 'value' => null],
            [['location_id'], 'integer'],
            [['description'], 'string', 'max' => 99],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'location_id']],
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
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'location_id' => 'Location ID',
        ];
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
    public function getEventOnModules()
    {
        return $this->hasMany(EventOnModule::className(), ['event_id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventPeople()
    {
        return $this->hasMany(EventPerson::className(), ['event_id' => 'event_id']);
    }
}
