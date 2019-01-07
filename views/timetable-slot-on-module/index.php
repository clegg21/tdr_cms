<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TimetableSlotOnModuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timetable Slot On Modules';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-slot-on-module-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Timetable Slot On Module', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'timetable_slot_module_id',
            'timetable_slot_id',
            'module_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
