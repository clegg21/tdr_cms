<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Locker */

$this->title = 'Create Locker';
$this->params['breadcrumbs'][] = ['label' => 'Lockers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locker-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
