<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $company_contact app\models\CompanyContact */
/* @var $person app\models\Person */

$this->title = 'Update Company Contact: ' . $company_contact->company_contact_id;
$this->params['breadcrumbs'][] = ['label' => 'Company Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $company_contact->company_contact_id, 'url' => ['view', 'id' => $company_contact->company_contact_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-contact-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'person' => $person,
        'company_contact' => $company_contact,
    ]) ?>

</div>
