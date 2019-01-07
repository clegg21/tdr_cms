<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $grouping app\models\Grouping */
/* @var $person app\models\Person */
/* @var $course app\models\Course */

$this->title = $grouping->group_number;
$this->params['breadcrumbs'][] = ['label' => 'Groupings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="grouping-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $grouping->grouping_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $grouping->grouping_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $grouping,
        'attributes' => [
//            'grouping_id',
            'group_number',
            [
                'label' => 'First Name',
                'value' => $person->first_name,
            ],
            [
                'label' => 'Last Name',
                'value' => $person->last_name,
            ],
            [
                'label' => 'Course',
                'value' => $course->description,
            ],
        ],
    ]) ?>

</div>
