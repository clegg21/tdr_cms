<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Locker */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="locker-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'locker_number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
