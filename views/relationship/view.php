<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $relationship app\models\Relationship */
/* @var $learner app\models\Learner */
/* @var $parent_guardian \app\models\ParentGuardian */
/* @var $parent_guardian_person \app\models\Person */

$this->title = $relationship->relationship_id;
$this->params['breadcrumbs'][] = ['label' => 'Relationships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="relationship-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $relationship->relationship_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $relationship->relationship_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $relationship,
        'attributes' => [
//            'relationship_id',
            [
                'label' => 'Learner',
                'value' => $learner->first_name . " " . $learner->last_name,
            ],
            [
                'label' => 'Parent/Guardian',
                'value' => $parent_guardian_person->first_name . " " . $parent_guardian_person->last_name,
            ],
            [
                'label' => 'Relationship',
                'value' => $parent_guardian->relationship_to_student,
            ],
        ],
    ]) ?>

</div>
