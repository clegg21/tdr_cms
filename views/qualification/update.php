<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Qualification */

$this->title = 'Update Qualification: ' . $model->qualification_id;
$this->params['breadcrumbs'][] = ['label' => 'Qualifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->qualification_id, 'url' => ['view', 'id' => $model->qualification_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="qualification-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
