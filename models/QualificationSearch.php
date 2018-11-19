<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Qualification;

/**
 * QualificationSearch represents the model behind the search form of `app\models\Qualification`.
 */
class QualificationSearch extends Qualification
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qualification_id'], 'integer'],
            [['qualification_name'], 'safe'],
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
        $query = Qualification::find();

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
            'qualification_id' => $this->qualification_id,
        ]);

        $query->andFilterWhere(['ilike', 'qualification_name', $this->qualification_name]);

        return $dataProvider;
    }
}
