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
                'label' => 'Person ID',
                'value' => $person->person_id,
            ],
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
                'label' => 'Person Type ID',
                'value' => $person->person_type_id,
            ],            [
                'label' => 'Learner ID',
                'value' => $learner->learner_id,
            ],            [
                'label' => 'Course ID',
                'value' => $learner->course_id,
            ],            [
                'label' => 'Start Date',
                'value' => $learner->start_date,
            ],            [
                'label' => 'End Date',
                'value' => $learner->end_date,
            ],            [
                'label' => 'Qualification ID',
                'value' => $learner->qualification_id,
            ],            [
                'label' => 'Status ID',
                'value' => $learner->status_id,
            ],            [
                'label' => 'Company ID',
                'value' => $learner->company_id,
            ],            [
                'label' => 'Locker ID',
                'value' => $learner->locker_id,
            ],
        ],
    ]) ?>

</div>
