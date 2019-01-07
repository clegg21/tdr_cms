<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TimetableSlotOnModule;

/**
 * TimetableSlotOnModuleSearch represents the model behind the search form of `app\models\TimetableSlotOnModule`.
 */
class TimetableSlotOnModuleSearch extends TimetableSlotOnModule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timetable_slot_module_id', 'module_id', 'timetable_slot_id'], 'integer'],
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
        $query = TimetableSlotOnModule::find();

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
            'timetable_slot_module_id' => $this->timetable_slot_module_id,
            'module_id' => $this->module_id,
            'timetable_slot_id' => $this->timetable_slot_id,
        ]);

        return $dataProvider;
    }
}
