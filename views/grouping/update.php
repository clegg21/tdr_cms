<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $grouping app\models\Grouping */
/* @var $person app\models\Person */
/* @var $course app\models\Course */

$this->title = 'Update Grouping: ' . $grouping->group_number;
$this->params['breadcrumbs'][] = ['label' => 'Groupings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $grouping->group_number, 'url' => ['view', 'id' => $grouping->grouping_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grouping-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'grouping' => $grouping,
        'person' => $person,
        'course' => $course,
    ]) ?>

</div>
