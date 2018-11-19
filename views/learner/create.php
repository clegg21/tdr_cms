<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $learner app\models\Learner */
/* @var $person app\models\Person */

$this->title = 'Create Learner';
$this->params['breadcrumbs'][] = ['label' => 'Learners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="learner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'person' => $person,
        'learner' => $learner,
    ]) ?>

</div>
