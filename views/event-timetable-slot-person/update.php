<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventTimetableSlotPerson */

$this->title = 'Update Event Timetable Slot Person: ' . $model->event_timetable_slot_person_id;
$this->params['breadcrumbs'][] = ['label' => 'Event Timetable Slot People', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->event_timetable_slot_person_id, 'url' => ['view', 'id' => $model->event_timetable_slot_person_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-timetable-slot-person-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
