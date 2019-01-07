<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $grouping app\models\Grouping */
/* @var $person app\models\Person */
/* @var $course app\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grouping-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($grouping, 'group_number')->textInput() ?>

    <?= $form->field($grouping, 'person_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Person::find()->asArray()->all(),
            'person_id',
            function($person) {
                return $person['first_name'].' '.$person['last_name'];
            })
    ) ?>

    <?= $form->field($grouping, 'course_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Course::find()->asArray()->all(), 'course_id', 'description')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
