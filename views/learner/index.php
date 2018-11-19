<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchLearner app\models\LearnerSearch */
/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = 'Learners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="learner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchLearner]); ?>

    <p>
        <?= Html::a('Create Learner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchLearner,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


//            'learner_id',
            'course_id',
            'start_date',
            'end_date',
            'qualification_id',
            'status_id',
            'company_id',
            'locker_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
