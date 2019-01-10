<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $instructor app\models\Instructor */
/* @var $person app\models\Person */

$this->title = $person->first_name . " " . $person->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Instructors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instructor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $instructor->instructor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $instructor->instructor_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <!--    Display the user friendly data, rather than id-->
    <?= DetailView::widget([
        'model' => $instructor,
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
//            'instructor_id',
            [
                'label' => 'Subject Taught',
                'value' => \app\models\Subject::findOne($instructor->subject_taught)->subject_name,
            ],
        ],
    ]) ?>

</div>
