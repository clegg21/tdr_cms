<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EventTimetableSlotPerson;

/**
 * EventTimetableSlotPersonSearch represents the model behind the search form of `app\models\EventTimetableSlotPerson`.
 */
class EventTimetableSlotPersonSearch extends EventTimetableSlotPerson
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_timetable_slot_person_id', 'person_id', 'event_id', 'timetable_slot_id'], 'integer'],
            [['in_attendance'], 'boolean'],
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
        $query = EventTimetableSlotPerson::find();

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
            'event_timetable_slot_person_id' => $this->event_timetable_slot_person_id,
            'person_id' => $this->person_id,
            'event_id' => $this->event_id,
            'timetable_slot_id' => $this->timetable_slot_id,
            'in_attendance' => $this->in_attendance,
        ]);

        return $dataProvider;
    }
}
