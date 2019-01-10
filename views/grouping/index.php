<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GroupingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $grouping app\models\Grouping */

$this->title = 'Groupings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grouping-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Grouping', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!--    Using the models passed in we can display the user friendly data rather than ids using a simple anonymous function-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'grouping_id',
            'group_number',
            [
                'label' => 'First Name',
                'attribute' => 'first_name',
                'value' => function($grouping) {$person = \app\models\Person::find()->where(['person_id'=>$grouping->person_id])->one();
                    return $person->first_name;},
            ],
            [
                'label' => 'Last Name',
                'attribute' => 'last_name',
                'value' => function($grouping) {$person = \app\models\Person::find()->where(['person_id'=>$grouping->person_id])->one();
                    return $person->last_name;},
            ],
            [
                'label' => 'Course',
                'attribute' => 'course_id',
                'value' => function($grouping) {$course = \app\models\Course::find()->where(['course_id'=>$grouping->course_id])->one();
                    return $course->description;},
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
