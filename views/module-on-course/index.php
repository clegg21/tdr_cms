<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModuleOnCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $module_on_course app\models\ModuleOnCourse */


$this->title = 'Module On Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-on-course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Module To Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'course_module_id',
            [
                'label' => 'Course',
                'attribute' => 'course_id',
                'value' => function($module_on_course) {$course = \app\models\Course::find()->where(['course_id'=>$module_on_course->course_id])->one();
                    return $course->description;},
            ],
            [
                'label' => 'Module',
                'attribute' => 'module_id',
                'value' => function($module_on_course) {$module = \app\models\Module::find()->where(['module_id'=>$module_on_course->module_id])->one();
                    return $module->description;},
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
