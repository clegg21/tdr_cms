<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $learner app\models\Learner */
/* @var $person app\models\Person */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="learner-form">

    <!--    Create dropdowns with the user friendly data, rather than the id -->
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($person, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'address_id')->textInput() ?>

    <?= $form->field($person, 'email_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($person, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($learner, 'course_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Course::find()->asArray()->all(), 'course_id', 'description')
    ) ?>

    <!--    Create a date pickers -->
    <?= $form->field($learner, 'start_date')->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'dd-MMM-yyyy',
    ]) ?>

    <?= $form->field($learner, 'end_date')->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'dd-MMM-yyyy',
    ]) ?>

    <?= $form->field($learner, 'qualification_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\app\models\Qualification::find()->asArray()->all(), 'qualification_id', 'qualification_name')
    ) ?>

    <?= $form->field($learner, 'status_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\app\models\Status::find()->asArray()->all(), 'status_id', 'status_description')
    ) ?>

    <?= $form->field($learner, 'company_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\app\models\Company::find()->asArray()->all(), 'company_id', 'company_name')
    ) ?>

    <?= $form->field($learner, 'locker_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\app\models\Locker::find()->asArray()->all(), 'locker_id', 'locker_number')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
