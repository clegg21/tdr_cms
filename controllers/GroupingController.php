<?php

namespace app\controllers;

use Yii;
use app\models\Course;
use app\models\Person;
use app\models\Grouping;
use app\models\GroupingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupingController implements the CRUD actions for Grouping model.
 */
class GroupingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Grouping models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GroupingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Grouping model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $grouping = $this->findModel($id);
        $course = Course::find()->where(['course_id' => $grouping->course_id])->one();
        $person = Person::find()->where(['person_id' => $grouping->person_id])->one();

        return $this->render('view', [
            'grouping' => $grouping,
            'course' => $course,
            'person' => $person,
        ]);
    }

    /**
     * Creates a new Grouping model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $grouping = new Grouping();
        $course = new Course();
        $person = new Person();

        if ($grouping->load(Yii::$app->request->post()) && $grouping->save()) {
            return $this->redirect(['view', 'id' => $grouping->grouping_id]);
        }

        return $this->render('create', [
            'grouping' => $grouping,
            'course' => $course,
            'person' => $person,
        ]);
    }

    /**
     * Updates an existing Grouping model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $grouping = $this->findModel($id);
        $course = Course::find()->where(['course_id' => $grouping->course_id])->one();
        $person = Person::find()->where(['person_id' => $grouping->person_id])->one();

        if ($grouping->load(Yii::$app->request->post()) && $grouping->save()) {
            return $this->redirect(['view', 'id' => $grouping->grouping_id]);
        }

        return $this->render('update', [
            'grouping' => $grouping,
            'course' => $course,
            'person' => $person,
        ]);
    }

    /**
     * Deletes an existing Grouping model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Grouping model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Grouping the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Grouping::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
