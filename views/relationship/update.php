<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $relationship app\models\Relationship */

$this->title = 'Update Relationship: ' . $relationship->relationship_id;
$this->params['breadcrumbs'][] = ['label' => 'Relationships', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $relationship->relationship_id, 'url' => ['view', 'id' => $relationship->relationship_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="relationship-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'relationship' => $relationship,
    ]) ?>

</div>
