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
            [['learner_id'], 'integer'],
            [['first_name', 'last_name', 'email_address', 'phone_number','start_date', 'end_date', 'course_id', 'qualification_id', 'status_id', 'company_id', 'locker_id'], 'safe'],
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

        $query->andFilterWhere(['ilike', 'course.description', $this->course_id])
            ->andFilterWhere(['ilike', 'qualification.qualification_name', $this->qualification_id])
            ->andFilterWhere(['ilike', 'status.status_description', $this->status_id])
            ->andFilterWhere(['ilike', 'company.company_name', $this->company_id])
            ->andFilterWhere(['ilike', 'locker.locker_number', $this->locker_id])
            ->andFilterWhere(['ilike', 'person.first_name', $this->first_name])
            ->andFilterWhere(['ilike', 'person.last_name', $this->last_name])
            ->andFilterWhere(['ilike', 'person.email_address', $this->email_address])
            ->andFilterWhere(['ilike', 'person.phone_number', $this->phone_number]);

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
                'course_id' => [
                    'asc' => ['course_id' => SORT_ASC],
                    'desc' => ['course_id' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'qualification_id' => [
                    'asc' => ['qualification_id' => SORT_ASC],
                    'desc' => ['qualification_id' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'start_date' => [
                    'asc' => ['start_date' => SORT_ASC],
                    'desc' => ['start_date' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'end_date' => [
                    'asc' => ['end_date' => SORT_ASC],
                    'desc' => ['end_date' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'status_id' => [
                    'asc' => ['status_id' => SORT_ASC],
                    'desc' => ['status_id' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'company_id' => [
                    'asc' => ['company_id' => SORT_ASC],
                    'desc' => ['company_id' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'locker_id' => [
                    'asc' => ['locker_id' => SORT_ASC],
                    'desc' => ['locker_id' => SORT_DESC],
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
