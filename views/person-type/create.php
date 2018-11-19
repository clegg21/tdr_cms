<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PersonType */

$this->title = 'Create Person Type';
$this->params['breadcrumbs'][] = ['label' => 'Person Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
