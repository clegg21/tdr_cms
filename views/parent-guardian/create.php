<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $parent_guardian app\models\ParentGuardian */
/* @var $person app\models\Person */

$this->title = 'Create Parent Guardian';
$this->params['breadcrumbs'][] = ['label' => 'Parent Guardians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parent-guardian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'person' => $person,
        'parent_guardian' => $parent_guardian,
    ]) ?>

</div>
