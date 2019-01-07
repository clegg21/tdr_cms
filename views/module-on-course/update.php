<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $module_on_course app\models\ModuleOnCourse */
/* @var $course app\models\Course */
/* @var $module app\models\Module */

$this->title = 'Update Module On Course: ' . $course->description;
$this->params['breadcrumbs'][] = ['label' => 'Module On Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $course->description, 'url' => ['view', 'id' => $module_on_course->course_module_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="module-on-course-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'module_on_course' => $module_on_course,
        'course' => $course,
        'module' => $module,
    ]) ?>

</div>
