<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TimetableSlotOnModule */

$this->title = 'Create Timetable Slot On Module';
$this->params['breadcrumbs'][] = ['label' => 'Timetable Slot On Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-slot-on-module-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
