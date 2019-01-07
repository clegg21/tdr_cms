<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TimetableSlot;

/**
 * TimetableSlotSearch represents the model behind the search form of `app\models\TimetableSlot`.
 */
class TimetableSlotSearch extends TimetableSlot
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timetable_slot_id', 'location_id'], 'integer'],
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
        $query = TimetableSlot::find();

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
            'timetable_slot_id' => $this->timetable_slot_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'location_id' => $this->location_id,
        ]);

        return $dataProvider;
    }
}
