<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $module_on_course app\models\ModuleOnCourse */
/* @var $course app\models\Course */
/* @var $module app\models\Module */

$this->title = 'Add Module To Course';
$this->params['breadcrumbs'][] = ['label' => 'Module On Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-on-course-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'module_on_course' => $module_on_course,
        'course' => $course,
        'module' => $module,
    ]) ?>

</div>
