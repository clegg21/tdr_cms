<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TimetableSlotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $timetable_slot app\models\TimetableSlot */

$this->title = 'Timetable Slots';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-slot-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Timetable Slot', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'timetable_slot_id',
            'start_date',
            'end_date',
            [
                'label' => 'Location',
                'attribute' => 'location_id',
                'value' => function($timetable_slot) {$location = \app\models\Location::find()->where(['location_id'=>$timetable_slot->location_id])->one();
                    return $location->description;},
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
