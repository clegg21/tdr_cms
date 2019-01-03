<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LearnerSearch */
/* @var $dataProvider yii\data\ArrayDataProvider */
/* @var $learner app\models\Learner */

$this->title = 'Learners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="learner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Learner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'First Name',
                'attribute' => 'first_name',
                'value' => function($learner) {$person = \app\models\Person::find()->where(['person_id'=>$learner->learner_id])->one();
                    return $person->first_name;},
            ],
            [
                'label' => 'Last Name',
                'attribute' => 'last_name',
                'value' => function($learner) {$person = \app\models\Person::find()->where(['person_id'=>$learner->learner_id])->one();
                    return $person->last_name;},
            ],
            [
                'label' => 'Email Address',
                'attribute' => 'email_address',
                'value' => function($learner) {$person = \app\models\Person::find()->where(['person_id'=>$learner->learner_id])->one();
                    return $person->email_address;},
            ],
            [
                'label' => 'Phone Number',
                'attribute' => 'phone_number',
                'value' => function($learner) {$person = \app\models\Person::find()->where(['person_id'=>$learner->learner_id])->one();
                    return $person->phone_number;},
            ],
            [
                'label' => 'Course',
                'attribute' => 'course_id',
                'value' => function($learner) {$course = \app\models\Course::find()->where(['course_id'=>$learner->course_id])->one();
                return $course->description;},
            ],
            'start_date',
            'end_date',
            [
                'label' => 'Qualification',
                'attribute' => 'qualification_id',
                'value' => function($learner) {$qualification = \app\models\Qualification::find()->where(['qualification_id'=>$learner->qualification_id])->one();
                    return $qualification->qualification_name;},
            ],
            [
                'label' => 'Status',
                'attribute' => 'status_id',
                'value' => function($learner) {$status = \app\models\Status::find()->where(['status_id'=>$learner->status_id])->one();
                    return $status->status_description;},
            ],[
                'label' => 'Company',
                'attribute' => 'company_id',
                'value' => function($learner) {$company = \app\models\Company::find()->where(['company_id'=>$learner->company_id])->one();
                    return $company->company_name;},
            ],[
                'label' => 'Locker Number',
                'attribute' => 'locker_id',
                'value' => function($learner) {$status = \app\models\Locker::find()->where(['locker_id'=>$learner->locker_id])->one();
                    return $status->locker_number;},
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
