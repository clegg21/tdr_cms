<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timetable_slot_on_module".
 *
 * @property int $timetable_slot_module_id
 * @property int $module_id
 * @property int $timetable_slot_id
 *
 * @property Module $module
 * @property TimetableSlot $timetableSlot
 */
class TimetableSlotOnModule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timetable_slot_on_module';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timetable_slot_module_id', 'module_id', 'timetable_slot_id'], 'required'],
            [['timetable_slot_module_id', 'module_id', 'timetable_slot_id'], 'default', 'value' => null],
            [['timetable_slot_module_id', 'module_id', 'timetable_slot_id'], 'integer'],
            [['timetable_slot_module_id'], 'unique'],
            [['module_id'], 'exist', 'skipOnError' => true, 'targetClass' => Module::className(), 'targetAttribute' => ['module_id' => 'module_id']],
            [['timetable_slot_id'], 'exist', 'skipOnError' => true, 'targetClass' => TimetableSlot::className(), 'targetAttribute' => ['timetable_slot_id' => 'timetable_slot_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'timetable_slot_module_id' => 'Timetable Slot Module ID',
            'module_id' => 'Module ID',
            'timetable_slot_id' => 'Timetable Slot ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(Module::className(), ['module_id' => 'module_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetableSlot()
    {
        return $this->hasOne(TimetableSlot::className(), ['timetable_slot_id' => 'timetable_slot_id']);
    }
}
