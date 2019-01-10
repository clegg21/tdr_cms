<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $parent_guardian app\models\ParentGuardian */
/* @var $person app\models\Person */

$this->title = $person->first_name . " " . $person->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Parent/Guardians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parent-guardian-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $parent_guardian->parent_guardian_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $parent_guardian->parent_guardian_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <!--    Display the user friendly data, rather than id-->
    <?= DetailView::widget([
        'model' => $parent_guardian,
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
//            'parent_guardian_id',
            'relationship_to_student',
        ],
    ]) ?>

</div>
