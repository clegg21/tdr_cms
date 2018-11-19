<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Learner */

$this->title = 'Update Learner: ' . $model->learner_id;
$this->params['breadcrumbs'][] = ['label' => 'Learners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->learner_id, 'url' => ['view', 'id' => $model->learner_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="learner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
