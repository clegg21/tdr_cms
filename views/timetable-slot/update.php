<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TimetableSlot */

$this->title = 'Update Timetable Slot: ' . $model->timetable_slot_id;
$this->params['breadcrumbs'][] = ['label' => 'Timetable Slots', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->timetable_slot_id, 'url' => ['view', 'id' => $model->timetable_slot_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timetable-slot-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
