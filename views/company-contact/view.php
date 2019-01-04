<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $company_contact app\models\CompanyContact */
/* @var $person app\models\Person */

$this->title = $person->first_name . " " . $person->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Company Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-contact-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $company_contact->company_contact_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $company_contact->company_contact_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $company_contact,
        'attributes' => [
            [
                'label' => 'First Name',
                'value' => $person->first_name,
            ],
            [
                'label' => 'Last Name',
                'value' => $person->last_name,
            ],
            [
                'label' => 'Address ID',
                'value' => $person->address_id,
            ],
            [
                'label' => 'Phone Number',
                'value' => $person->phone_number,
            ],
            [
                'label' => 'Person Type',
                'value' => \app\models\PersonType::findOne($person->person_type_id)->person_type,
            ],
//            'company_contact_id',
            [
                'label' => 'Company',
                'value' => \app\models\Company::findOne($company_contact->company_id)->company_name,
            ],
        ],
    ]) ?>

</div>
