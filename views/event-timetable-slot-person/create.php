<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventTimetableSlotPerson */

$this->title = 'Create Event Timetable Slot Person';
$this->params['breadcrumbs'][] = ['label' => 'Event Timetable Slot People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-timetable-slot-person-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
