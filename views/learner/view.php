<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $learner app\models\Learner */

$this->title = $learner->learner_id;
$this->params['breadcrumbs'][] = ['label' => 'Learners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="learner-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $learner->learner_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $learner->learner_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $learner,
        'attributes' => [
            'learner_id',
            'course_id',
            'start_date',
            'end_date',
            'qualification_id',
            'status_id',
            'company_id',
            'locker_id',
        ],
    ]) ?>

</div>
