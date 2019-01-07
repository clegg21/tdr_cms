<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EventTimetableSlotPerson */

$this->title = $model->event_timetable_slot_person_id;
$this->params['breadcrumbs'][] = ['label' => 'Event Timetable Slot People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="event-timetable-slot-person-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->event_timetable_slot_person_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->event_timetable_slot_person_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'event_timetable_slot_person_id:datetime',
            'person_id',
            'event_id',
            'timetable_slot_id:datetime',
            'in_attendance:boolean',
        ],
    ]) ?>

</div>
