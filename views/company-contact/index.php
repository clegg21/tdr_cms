<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanyContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $company_contact app\models\CompanyContact */

$this->title = 'Company Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-contact-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Company Contact', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'First Name',
                'attribute' => 'first_name',
                'value' => function($company_contact) {$person = \app\models\Person::find()->where(['person_id'=>$company_contact->company_contact_id])->one();
                    return $person->first_name;},
            ],
            [
                'label' => 'Last Name',
                'attribute' => 'last_name',
                'value' => function($company_contact) {$person = \app\models\Person::find()->where(['person_id'=>$company_contact->company_contact_id])->one();
                    return $person->last_name;},
            ],
            [
                'label' => 'Email Address',
                'attribute' => 'email_address',
                'value' => function($company_contact) {$person = \app\models\Person::find()->where(['person_id'=>$company_contact->company_contact_id])->one();
                    return $person->email_address;},
            ],
            [
                'label' => 'Phone Number',
                'attribute' => 'phone_number',
                'value' => function($company_contact) {$person = \app\models\Person::find()->where(['person_id'=>$company_contact->company_contact_id])->one();
                    return $person->phone_number;},
            ],
//            'company_contact_id',
            [
                'label' => 'Company',
                'attribute' => 'company_id',
                'value' => function($company_contact) {$company = \app\models\Company::find()->where(['company_id'=>$company_contact->company_id])->one();
                    return $company->company_name;},
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
