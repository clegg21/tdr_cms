<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $company_contact app\models\CompanyContact */
/* @var $person app\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($person, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'address_id')->textInput() ?>

    <?= $form->field($person, 'email_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'phone_number')->textInput(['maxlength' => true]) ?>

    <!--    Create a dropdown with the associated company name, rather than the id -->
    <?= $form->field($company_contact, 'company_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Company::find()->asArray()->all(), 'company_id', 'company_name')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
