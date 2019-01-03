<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company_contact".
 *
 * @property int $company_contact_id
 * @property int $company_id
 *
 * @property Company $company
 * @property Person $companyContact
 */
class CompanyContact extends \app\models\Person
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_contact_id', 'company_id'], 'required'],
            [['company_contact_id', 'company_id'], 'default', 'value' => null],
            [['company_contact_id', 'company_id'], 'integer'],
            [['company_contact_id'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
            [['company_contact_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['company_contact_id' => 'person_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_contact_id' => 'Company Contact ID',
            'company_id' => 'Company ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyContact()
    {
        return $this->hasOne(Person::className(), ['person_id' => 'company_contact_id']);
    }
}
