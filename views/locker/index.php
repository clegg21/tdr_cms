<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LockerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lockers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locker-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Locker', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'locker_id',
            'locker_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
