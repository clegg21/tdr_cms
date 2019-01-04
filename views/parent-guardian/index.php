<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParentGuardianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $parent_guardian \app\models\ParentGuardian */

$this->title = 'Parent/Guardians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parent-guardian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Parent/Guardian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'First Name',
                'attribute' => 'first_name',
                'value' => function($parent_guardian) {$person = \app\models\Person::find()->where(['person_id'=>$parent_guardian->parent_guardian_id])->one();
                    return $person->first_name;},
            ],
            [
                'label' => 'Last Name',
                'attribute' => 'last_name',
                'value' => function($parent_guardian) {$person = \app\models\Person::find()->where(['person_id'=>$parent_guardian->parent_guardian_id])->one();
                    return $person->last_name;},
            ],
            [
                'label' => 'Email Address',
                'attribute' => 'email_address',
                'value' => function($parent_guardian) {$person = \app\models\Person::find()->where(['person_id'=>$parent_guardian->parent_guardian_id])->one();
                    return $person->email_address;},
            ],
            [
                'label' => 'Phone Number',
                'attribute' => 'phone_number',
                'value' => function($parent_guardian) {$person = \app\models\Person::find()->where(['person_id'=>$parent_guardian->parent_guardian_id])->one();
                    return $person->phone_number;},
            ],
//            'parent_guardian_id',
            'relationship_to_student',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
