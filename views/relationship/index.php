<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RelationshipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $parent_guardian app\models\ParentGuardian */
/* @var $relationship app\models\Relationship */

$this->title = 'Relationships';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relationship-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Relationship', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'relationship_id',
//            'student_id',
//            'parent_guardian_id',
            [
                'label' => 'Learner',
                'attribute' => 'student_id',
                'value' => function($relationship) {$person = \app\models\Person::find()->where(['person_id'=>$relationship->student_id])->one();
                    return $person->first_name . " " . $person->last_name;},
            ],
            [
                'label' => 'Parent/Guardian',
                'attribute' => 'parent_guardian_id',
                'value' => function($relationship) {$person = \app\models\Person::find()->where(['person_id'=>$relationship->parent_guardian_id])->one();
                    return $person->first_name . " " . $person->last_name;},
            ],
            [
                'label' => 'Relationship',
                'attribute' => 'parent_guardian_id',
                'value' => function($relationship) {$parent_guardian = \app\models\ParentGuardian::find()->where(['parent_guardian_id'=>$relationship->parent_guardian_id])->one();
                    return $parent_guardian->relationship_to_student;},
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
