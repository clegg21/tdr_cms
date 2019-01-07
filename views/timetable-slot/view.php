<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $timetable_slot app\models\TimetableSlot */
/* @var $location app\models\Location */

$this->title = $timetable_slot->timetable_slot_id;
$this->params['breadcrumbs'][] = ['label' => 'Timetable Slots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="timetable-slot-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $timetable_slot->timetable_slot_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $timetable_slot->timetable_slot_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $timetable_slot,
        'attributes' => [
//            'timetable_slot_id',
            'start_date:datetime',
            'end_date:datetime',
            [
                'label' => 'Location',
                'value' => $location->description,
            ],
        ],
    ]) ?>

</div>
