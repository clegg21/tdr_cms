<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $learner app\models\Learner */
/* @var $person app\models\Person */

$this->title = 'Update Learner: ' . $learner->learner_id;
$this->params['breadcrumbs'][] = ['label' => 'Learners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $learner->learner_id, 'url' => ['view', 'id' => $learner->learner_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="learner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'person' => $person,
        'learner' => $learner,
    ]) ?>

</div>
