<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Locker;

/**
 * LockerSearch represents the model behind the search form of `app\models\Locker`.
 */
class LockerSearch extends Locker
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['locker_id'], 'integer'],
            [['locker_number'], 'safe'],
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
        $query = Locker::find();

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
            'locker_id' => $this->locker_id,
        ]);

        $query->andFilterWhere(['ilike', 'locker_number', $this->locker_number]);

        return $dataProvider;
    }
}
