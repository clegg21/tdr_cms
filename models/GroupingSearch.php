<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Grouping;

/**
 * GroupingSearch represents the model behind the search form of `app\models\Grouping`.
 */
class GroupingSearch extends Grouping
{
    public $first_name;
    public $last_name;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grouping_id', 'group_number', 'person_id'], 'integer'],
            [['first_name', 'last_name', 'description', 'course_id'], 'safe'],
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
        $query = Grouping::find();
        $query->leftJoin('course', 'grouping.course_id=course.course_id');
        $query->leftJoin('person', 'grouping.person_id=person.person_id');

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
            'grouping_id' => $this->grouping_id,
            'group_number' => $this->group_number,
        ])
        ->andFilterWhere(['ilike', 'course.description', $this->course_id])
        ->andFilterWhere(['ilike', 'person.person_id', $this->person_id])
        ->andFilterWhere(['ilike', 'person.first_name', $this->first_name])
        ->andFilterWhere(['ilike', 'person.last_name', $this->last_name]);

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
                'group_number' => [
                    'asc' => ['group_number' => SORT_ASC],
                    'desc' => ['group_number' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'course_id' => [
                    'asc' => ['course_id' => SORT_ASC],
                    'desc' => ['course_id' => SORT_DESC],
                    'default' => SORT_ASC
                ],
            ],
            'defaultOrder' => [
                'group_number' => SORT_ASC
            ]
        ]);

        return $dataProvider;
    }
}
