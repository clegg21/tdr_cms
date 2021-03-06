<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $parent_guardian app\models\ParentGuardian */
/* @var $person app\models\Person */

$this->title = 'Update Parent/Guardian: ' . $person->first_name . " " . $person->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Parent/Guardians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $person->first_name . " " . $person->last_name, 'url' => ['view', 'id' => $parent_guardian->parent_guardian_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parent-guardian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'person' => $person,
        'parent_guardian' => $parent_guardian,
    ]) ?>

</div>
