<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TimetableSlotOnModule */

$this->title = 'Update Timetable Slot On Module: ' . $model->timetable_slot_module_id;
$this->params['breadcrumbs'][] = ['label' => 'Timetable Slot On Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->timetable_slot_module_id, 'url' => ['view', 'id' => $model->timetable_slot_module_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timetable-slot-on-module-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
