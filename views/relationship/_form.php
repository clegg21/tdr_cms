<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $relationship app\models\Relationship */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relationship-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($relationship, 'student_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Person::find()->asArray()->all(),
            'person_id',
            function($person) {
                return $person['first_name'].' '.$person['last_name'];
            })
    ) ?>
    
    <?= $form->field($relationship, 'parent_guardian_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Person::find()->asArray()->all(),
            'person_id',
            function($person) {
                return $person['first_name'].' '.$person['last_name'];
            })
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
