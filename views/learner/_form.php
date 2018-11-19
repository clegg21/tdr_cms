<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $learner app\models\Learner */
/* @var $person app\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="learner-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($person, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'address_id')->textInput() ?>

    <?= $form->field($person, 'email_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'person_type_id')->textInput() ?>

    <?= $form->field($learner, 'course_id')->textInput() ?>

    <?= $form->field($learner, 'start_date')->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'dd-MMM-yyyy',
    ]) ?>

    <?= $form->field($learner, 'end_date')->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'dd-MMM-yyyy',
    ]) ?>

    <?= $form->field($learner, 'qualification_id')->textInput() ?>

    <?= $form->field($learner, 'status_id')->textInput() ?>

    <?= $form->field($learner, 'company_id')->textInput() ?>

    <?= $form->field($learner, 'locker_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
