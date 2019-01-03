<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "module".
 *
 * @property int $module_id
 * @property string $description
 *
 * @property ModuleOnCourse[] $moduleOnCourses
 * @property TimetableSlotOnModule[] $timetableSlotOnModules
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module';
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
            'module_id' => 'Module ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModuleOnCourses()
    {
        return $this->hasMany(ModuleOnCourse::className(), ['module_id' => 'module_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetableSlotOnModules()
    {
        return $this->hasMany(TimetableSlotOnModule::className(), ['module_id' => 'module_id']);
    }
}
