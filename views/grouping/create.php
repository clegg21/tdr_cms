<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $grouping app\models\Grouping */
/* @var $person app\models\Person */
/* @var $course app\models\Course */

$this->title = 'Create Grouping';
$this->params['breadcrumbs'][] = ['label' => 'Groupings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grouping-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'grouping' => $grouping,
        'person' => $person,
        'course' => $course,
    ]) ?>

</div>
