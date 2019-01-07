<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "module_on_course".
 *
 * @property int $course_module_id
 * @property int $course_id
 * @property int $module_id
 *
 * @property Course $course
 * @property Module $module
 */
class ModuleOnCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module_on_course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'module_id'], 'required'],
            [['course_id', 'module_id'], 'default', 'value' => null],
            [['course_id', 'module_id'], 'integer'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'course_id']],
            [['module_id'], 'exist', 'skipOnError' => true, 'targetClass' => Module::className(), 'targetAttribute' => ['module_id' => 'module_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'course_module_id' => 'Course Module ID',
            'course_id' => 'Course',
            'module_id' => 'Module',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['course_id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(Module::className(), ['module_id' => 'module_id']);
    }
}
