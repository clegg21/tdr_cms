<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ModuleOnCourse;

/**
 * ModuleOnCourseSearch represents the model behind the search form of `app\models\ModuleOnCourse`.
 */
class ModuleOnCourseSearch extends ModuleOnCourse
{
    public $course;
    public $module;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_module_id', 'course_id', 'module_id'], 'integer'],
            [['description', 'description'], 'safe'],
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
        $query = ModuleOnCourse::find();
        $query->leftJoin('course', 'module_on_course.course_id=course.course_id');
        $query->leftJoin('module', 'module_on_course.module_id=module.module_id');

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
//            'course_module_id' => $this->course_module_id,
            'course_id' => $this->course_id,
            'module_id' => $this->module_id,
        ])
        ->andFilterWhere(['ilike', 'course.course_id', $this->course_id])
        ->andFilterWhere(['ilike', 'module.module_id', $this->module_id]);

        $dataProvider->setSort([
            'attributes' => [
                'course_id' => [
                    'asc' => ['course_id' => SORT_ASC],
                    'desc' => ['course_id' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'last_name' => [
                    'asc' => ['module_id' => SORT_ASC],
                    'desc' => ['module_id' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
            ],
            'defaultOrder' => [
                'course_id' => SORT_ASC
            ]
        ]);
        return $dataProvider;
    }
}
