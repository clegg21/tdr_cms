<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $company_contact app\models\CompanyContact */
/* @var $person app\models\Person */

$this->title = 'Create Company Contact';
$this->params['breadcrumbs'][] = ['label' => 'Company Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-contact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'person' => $person,
        'company_contact' => $company_contact,
    ]) ?>

</div>
