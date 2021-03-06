<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CompanyContact;

/**
 * CompanyContactSearch represents the model behind the search form of `app\models\CompanyContact`.
 */
class CompanyContactSearch extends CompanyContact
{
    public $first_name;
    public $last_name;
    public $email_address;
    public $phone_number;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_contact_id', 'company_id'], 'integer'],
            [['first_name', 'last_name', 'email_address', 'phone_number'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        // We need to join the database tables together so we can access all the data about the CompanyContact
        $query = CompanyContact::find();
        $query->leftJoin('person', 'company_contact.company_contact_id=person.person_id');
        $query->leftJoin('company', 'company_contact.company_id=company.company_id');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions, we need to filter the person details to so that we can sort and search them
        $query->andFilterWhere([
            'company_contact_id' => $this->company_contact_id,
            'company_id' => $this->company_id,
        ])
        ->andFilterWhere(['ilike', 'person.first_name', $this->first_name])
        ->andFilterWhere(['ilike', 'person.last_name', $this->last_name])
        ->andFilterWhere(['ilike', 'person.email_address', $this->email_address])
        ->andFilterWhere(['ilike', 'person.phone_number', $this->phone_number]);

        // This allows the user to sort the columns
        $dataProvider->setSort([
            'attributes' => [
                'first_name' => [
                    'asc' => ['first_name' => SORT_ASC],
                    'desc' => ['first_name' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'last_name' => [
                    'asc' => ['last_name' => SORT_ASC],
                    'desc' => ['last_name' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'email_address' => [
                    'asc' => ['email_address' => SORT_ASC],
                    'desc' => ['email_address' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'phone_number' => [
                    'asc' => ['phone_number' => SORT_ASC],
                    'desc' => ['phone_number' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'company_id' => [
                    'asc' => ['company_id' => SORT_ASC],
                    'desc' => ['company_id' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
            ],
            'defaultOrder' => [
                'last_name' => SORT_ASC
            ]
        ]);

        return $dataProvider;
    }
}
