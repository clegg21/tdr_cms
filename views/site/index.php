<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to the TDR Content Management System</h1>
<!---->
<!--        <p class="lead">You have successfully created your Yii-powered application.</p>-->
<!---->
<!--        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-2">
                <p>
                    <?= Html::a('View Learners', ['learner/index'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="col-lg-2">
                <p>
                    <?= Html::a('View Addresses', ['address/index'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="col-lg-2">
                <p>
                    <?= Html::a('View Companies', ['company/index'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="col-lg-2">
                <p>
                    <?= Html::a('View Courses', ['course/index'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="col-lg-2">
                <p>
                    <?= Html::a('View Lockers', ['locker/index'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="col-lg-2">
                <p>
                    <?= Html::a('View Person Types', ['person-type/index'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2">
                <p>
                    <?= Html::a('View Qualifications', ['qualification/index'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="col-lg-2">
                <p>
                    <?= Html::a('View Statues', ['status/index'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="col-lg-2">
                <p>
                    <?= Html::a('View Subjects', ['subject/index'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="col-lg-2">
                <p>
                    <?= Html::a('View Instructors', ['instructor/index'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="col-lg-2">
                <p>
                    <?= Html::a('View Company Contacts', ['company-contact/index'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
<!--            <div class="col-lg-2">-->
<!--                <p>-->
<!--                    --><?//= Html::a('View Person Types', ['person-type/index'], ['class' => 'btn btn-success']) ?>
<!--                </p>-->
<!--            </div>-->
        </div>
    </div>

</div>
