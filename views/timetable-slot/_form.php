<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\TimetableSlot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timetable-slot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'start_date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event start time ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]); ?>

    <?= $form->field($model, 'end_date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event end time ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]); ?>

    <?= $form->field($model, 'location_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Location::find()->asArray()->all(), 'location_id', 'description')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
