<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $module_on_course app\models\ModuleOnCourse */
/* @var $course app\models\Course */
/* @var $module app\models\Module */

$this->title = $course->description;
$this->params['breadcrumbs'][] = ['label' => 'Modules On Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="module-on-course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $module_on_course->course_module_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $module_on_course->course_module_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $module_on_course,
        'attributes' => [
            [
                'label' => 'Course ',
                'value' => $course->description,
            ],
            [
                'label' => 'Module',
                'value' => $module->description,
            ],
        ],
    ]) ?>

</div>
