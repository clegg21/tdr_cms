<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ParentGuardian;

/**
 * ParentGuardianSearch represents the model behind the search form of `app\models\ParentGuardian`.
 */
class ParentGuardianSearch extends ParentGuardian
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
            [['parent_guardian_id'], 'integer'],
            [['first_name', 'last_name', 'email_address', 'phone_number', 'relationship_to_student'], 'safe'],
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
        $query = ParentGuardian::find();
        $query->leftJoin('person', 'parent_guardian.parent_guardian_id=person.person_id');

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

        // grid filtering conditions
        $query->andFilterWhere([
            'parent_guardian_id' => $this->parent_guardian_id,
        ])
        ->andFilterWhere(['ilike', 'person.first_name', $this->first_name])
        ->andFilterWhere(['ilike', 'person.last_name', $this->last_name])
        ->andFilterWhere(['ilike', 'person.email_address', $this->email_address])
        ->andFilterWhere(['ilike', 'person.phone_number', $this->phone_number]);

        $query->andFilterWhere(['ilike', 'relationship_to_student', $this->relationship_to_student]);

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
                'relationship_to_student' => [
                    'asc' => ['relationship_to_student' => SORT_ASC],
                    'desc' => ['relationship_to_student' => SORT_DESC],
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
