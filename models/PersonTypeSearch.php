<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PersonType;

/**
 * PersonTypeSearch represents the model behind the search form of `app\models\PersonType`.
 */
class PersonTypeSearch extends PersonType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_type_id'], 'integer'],
            [['person_type'], 'safe'],
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
        $query = PersonType::find();

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
            'person_type_id' => $this->person_type_id,
        ]);

        $query->andFilterWhere(['ilike', 'person_type', $this->person_type]);

        return $dataProvider;
    }
}
