<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_on_module".
 *
 * @property int $event_module_id
 * @property int $module_id
 * @property int $event_id
 *
 * @property Event $event
 * @property Module $module
 */
class EventOnModule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_on_module';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['module_id', 'event_id'], 'required'],
            [['module_id', 'event_id'], 'default', 'value' => null],
            [['module_id', 'event_id'], 'integer'],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'event_id']],
            [['module_id'], 'exist', 'skipOnError' => true, 'targetClass' => Module::className(), 'targetAttribute' => ['module_id' => 'module_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_module_id' => 'Event Module ID',
            'module_id' => 'Module ID',
            'event_id' => 'Event ID',
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
    public function getModule()
    {
        return $this->hasOne(Module::className(), ['module_id' => 'module_id']);
    }
}
