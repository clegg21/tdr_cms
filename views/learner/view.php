<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $learner app\models\Learner */
/* @var $person app\models\Person */

$this->title = $person->first_name . " " . $person->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Learners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="learner-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $learner->learner_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $learner->learner_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?= DetailView::widget([
        'model' => [ $person, $learner ],
        'attributes' => [
            [
                'label' => 'First Name',
                'value' => $person->first_name,
            ],
            [
                'label' => 'Last Name',
                'value' => $person->last_name,
            ],
            [
                'label' => 'Address ID',
                'value' => $person->address_id,
            ],
            [
                'label' => 'Phone Number',
                'value' => $person->phone_number,
            ],
            [
                'label' => 'Person Type',
                'value' => \app\models\PersonType::findOne($person->person_type_id)->person_type,
            ],
            [
                'label' => 'Course',
                'value' => \app\models\Course::findOne($learner->course_id)->description,
            ],
            [
                'label' => 'Start Date',
                'value' => $learner->start_date,
            ],
            [
                'label' => 'End Date',
                'value' => $learner->end_date,
            ],
            [
                'label' => 'Qualification',
                'value' => \app\models\Qualification::findOne($learner->qualification_id)->qualification_name,
            ],
            [
                'label' => 'Status',
                'value' => \app\models\Status::findOne($learner->status_id)->status_description,
            ],
            [
                'label' => 'Company',
                'value' => \app\models\Company::findOne($learner->company_id)->company_name,
            ],
            [
                'label' => 'Locker',
                'value' => \app\models\Locker::findOne($learner->locker_id)->locker_number,
            ],
        ],
    ]) ?>

</div>
