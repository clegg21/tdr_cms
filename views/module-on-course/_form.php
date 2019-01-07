<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $module_on_course app\models\ModuleOnCourse */
/* @var $course app\models\Course */
/* @var $module app\models\Module */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="module-on-course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($module_on_course, 'course_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Course::find()->asArray()->all(), 'course_id', 'description')
    ) ?>

    <?= $form->field($module_on_course, 'module_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Module::find()->asArray()->all(), 'module_id', 'description')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
