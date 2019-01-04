<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $instructor app\models\Instructor */
/* @var $person app\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instructor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($person, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'address_id')->textInput() ?>

    <?= $form->field($person, 'email_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'person_type_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\PersonType::find()->asArray()->all(), 'person_type_id', 'person_type')
    ) ?>

    <?= $form->field($instructor, 'subject_taught')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Subject::find()->asArray()->all(), 'subject_id', 'subject_name')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
