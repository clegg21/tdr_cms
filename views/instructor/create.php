<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $instructor app\models\Instructor */
/* @var $person app\models\Person */

$this->title = 'Create Instructor';
$this->params['breadcrumbs'][] = ['label' => 'Instructors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instructor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'person' => $person,
        'instructor' => $instructor,
    ]) ?>

</div>
