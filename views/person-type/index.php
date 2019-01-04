<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Person Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Person Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'person_type_id',
            'person_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
