<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonType */

$this->title = 'Update Person Type: ' . $model->person_type_id;
$this->params['breadcrumbs'][] = ['label' => 'Person Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->person_type_id, 'url' => ['view', 'id' => $model->person_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="person-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
