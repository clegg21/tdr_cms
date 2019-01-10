<?php

namespace app\controllers;

use Yii;
use app\models\Person;
use app\models\Learner;
use app\models\LearnerSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LearnerController implements the CRUD actions for Learner model.
 */
class LearnerController extends PersonController
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
     * Lists all Learner models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LearnerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Learner model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        // Before we can render the Learner we need to find the associated supertype Person
        $person =  Person::find()->where(['person_id' => $id])->one();

        return $this->render('view', [
            'learner' => $this->findModel($id),
            'person' => $person
        ]);
    }

    /**
     * Creates a new Learner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $person = new Person();
        $learner = new Learner();

        // Hardcoded for time being
        $person->person_type_id = 1;

        if ($person->load(Yii::$app->request->post()) && $person->save()) {
            // Assigning the person_id to the learner_id will keep the data consistent
            $learner->learner_id = $person->person_id;
        }

        $learner->learner_id = $person->person_id;

        if ($learner->load(Yii::$app->request->post()) && $learner->save()) {
            return $this->redirect(['view', 'id' => $learner->learner_id]);
        }

        return $this->render('create', [
            'person' => $person,
            'learner' => $learner,
        ]);
    }

    /**
     * Updates an existing Learner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        // Before we can edit the Learner we need to find the associated supertype Person
        $person =  Person::find()->where(['person_id' => $id])->one();
        $learner = $this->findModel($id);

        if ($person->load(Yii::$app->request->post()) && $person->save() && $learner->load(Yii::$app->request->post()) && $learner->save()) {
            return $this->redirect(['view', 'id' => $learner->learner_id]);
        }

        return $this->render('update', [
            'person' => $person,
            'learner' => $learner,
        ]);
    }

    /**
     * Deletes an existing Learner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        // We need to delete the Person as well as the Learner without redirecting to the index page of Person
        PersonController::actionDeleteWithoutRedirect($id);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Learner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Learner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Learner::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
