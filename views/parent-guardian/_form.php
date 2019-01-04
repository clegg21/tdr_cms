<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $parent_guardian app\models\ParentGuardian */
/* @var $person app\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parent-guardian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($person, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'address_id')->textInput() ?>

    <?= $form->field($person, 'email_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'person_type_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\PersonType::find()->asArray()->all(), 'person_type_id', 'person_type')
    ) ?>

    <?= $form->field($parent_guardian, 'relationship_to_student')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
