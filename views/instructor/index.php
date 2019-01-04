<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstructorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $instructor app\models\Instructor */

$this->title = 'Instructors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instructor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Instructor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'First Name',
                'attribute' => 'first_name',
                'value' => function($instructor) {$person = \app\models\Person::find()->where(['person_id'=>$instructor->instructor_id])->one();
                    return $person->first_name;},
            ],
            [
                'label' => 'Last Name',
                'attribute' => 'last_name',
                'value' => function($instructor) {$person = \app\models\Person::find()->where(['person_id'=>$instructor->instructor_id])->one();
                    return $person->last_name;},
            ],
            [
                'label' => 'Email Address',
                'attribute' => 'email_address',
                'value' => function($instructor) {$person = \app\models\Person::find()->where(['person_id'=>$instructor->instructor_id])->one();
                    return $person->email_address;},
            ],
            [
                'label' => 'Phone Number',
                'attribute' => 'phone_number',
                'value' => function($instructor) {$person = \app\models\Person::find()->where(['person_id'=>$instructor->instructor_id])->one();
                    return $person->phone_number;},
            ],
//            'instructor_id',
            [
                'label' => 'Subject Taught',
                'attribute' => 'subject_taught',
                'value' => function($instructor) {$subject = \app\models\Subject::find()->where(['subject_id'=>$instructor->subject_taught])->one();
                    return $subject->subject_name;},
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
