<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $instructor app\models\Instructor */
/* @var $person app\models\Person */

$this->title = 'Update Instructor: ' . $person->first_name . " " . $person->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Instructors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $person->first_name . " " . $person->last_name, 'url' => ['view', 'id' => $instructor->instructor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="instructor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'person' => $person,
        'instructor' => $instructor,
    ]) ?>

</div>
