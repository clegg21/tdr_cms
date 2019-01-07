<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventTimetableSlotPersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $etsp \app\models\EventTimetableSlotPerson */

$this->title = 'Event Timetable Slot People';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-timetable-slot-person-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Event Timetable Slot Person', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'event_timetable_slot_person_id',
            [
                'label' => 'Person',
                'attribute' => 'person_id',
                'value' => function($etsp) {$person = \app\models\Person::find()->where(['person_id'=>$etsp->person_id])->one();
                    return $person->first_name . " " . $person->last_name;},
            ],
            [
                'label' => 'Event',
                'attribute' => 'event_id',
                'value' => function($etsp) {$event = \app\models\Event::find()->where(['event_id'=>$etsp->event_id])->one();
                    return $event->description;},
            ],
            [
                'label' => 'Location',
                'attribute' => 'timetable_slot_id',
                'value' => function($etsp) {
                    $timetable_slot = \app\models\TimetableSlot::find()->where(['timetable_slot_id'=>$etsp->timetable_slot_id])->one();
                    $location = \app\models\Location::find()->where(['location_id'=>$timetable_slot->location_id])->one();
                    return $location->description;},
            ],
            [
                'label' => 'Start Date',
                'attribute' => 'timetable_slot_id',
                'value' => function($etsp) {
                    $timetable_slot = \app\models\TimetableSlot::find()->where(['timetable_slot_id'=>$etsp->timetable_slot_id])->one();
                    return $timetable_slot->start_date;},
            ],
            [
                'label' => 'End Date',
                'attribute' => 'timetable_slot_id',
                'value' => function($etsp) {
                    $timetable_slot = \app\models\TimetableSlot::find()->where(['timetable_slot_id'=>$etsp->timetable_slot_id])->one();
                    return $timetable_slot->end_date;},
            ],
            'timetable_slot_id',
            'in_attendance:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
