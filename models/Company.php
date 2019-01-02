<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $company_id
 * @property string $company_name
 *
 * @property CompanyContact[] $companyContacts
 * @property Learner[] $learners
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'company_name'], 'required'],
            [['company_id'], 'default', 'value' => null],
            [['company_id'], 'integer'],
            [['company_name'], 'string', 'max' => 50],
            [['company_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyContacts()
    {
        return $this->hasMany(CompanyContact::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLearners()
    {
        return $this->hasMany(Learner::className(), ['status_id' => 'company_id']);
    }
}
