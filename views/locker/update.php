<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Locker */

$this->title = 'Update Locker: ' . $model->locker_id;
$this->params['breadcrumbs'][] = ['label' => 'Lockers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->locker_id, 'url' => ['view', 'id' => $model->locker_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="locker-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
