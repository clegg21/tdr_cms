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
            [['learner_id'], 'integer'],
            [['start_date', 'end_date', 'course_id', 'qualification_id', 'status_id', 'company_id', 'locker_id'], 'safe'],
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
        $query->leftJoin('person', 'learner.learner_id=person.person_id');
        $query->leftJoin('course', 'learner.course_id=course.course_id');
        $query->leftJoin('qualification', 'learner.qualification_id=qualification.qualification_id');
        $query->leftJoin('status', 'learner.status_id=status.status_id');
        $query->leftJoin('company', 'learner.company_id=company.company_id');
        $query->leftJoin('locker', 'learner.locker_id=locker.locker_id');

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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        $query->andFilterWhere(['like', 'course.description', $this->course_id])
            ->andFilterWhere(['like', 'qualification.qualification_name', $this->qualification_id])
            ->andFilterWhere(['like', 'status.status_description', $this->status_id])
            ->andFilterWhere(['like', 'company.company_name', $this->company_id])
            ->andFilterWhere(['like', 'locker.locker_number', $this->locker_id]);

        return $dataProvider;
    }
}
