<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TimetableSlotOnModuleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timetable-slot-on-module-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'timetable_slot_module_id') ?>

    <?= $form->field($model, 'module_id') ?>

    <?= $form->field($model, 'timetable_slot_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
