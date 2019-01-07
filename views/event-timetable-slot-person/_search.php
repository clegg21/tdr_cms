<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EventTimetableSlotPersonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-timetable-slot-person-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'event_timetable_slot_person_id') ?>

    <?= $form->field($model, 'person_id') ?>

    <?= $form->field($model, 'event_id') ?>

    <?= $form->field($model, 'timetable_slot_id') ?>

    <?= $form->field($model, 'in_attendance')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
