<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Learner;

/**
 * LearnerSearch represents the model behind the search form of `app\models\Learner`.
 */
class LearnerSearch extends Learner
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['learner_id', 'course_id', 'qualification_id', 'status_id', 'company_id', 'locker_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
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
        $query = Learner::find();

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
            'learner_id' => $this->learner_id,
            'course_id' => $this->course_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'qualification_id' => $this->qualification_id,
            'status_id' => $this->status_id,
            'company_id' => $this->company_id,
            'locker_id' => $this->locker_id,
        ]);

        return $dataProvider;
    }
}
