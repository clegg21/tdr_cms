<?php

namespace app\controllers;

use Yii;
use app\models\Person;
use app\models\Instructor;
use app\models\InstructorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InstructorController implements the CRUD actions for Instructor model.
 */
class InstructorController extends PersonController
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
     * Lists all Instructor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InstructorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Instructor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        // Before we can render the Instructor we need to find the associated supertype Person
        $person =  Person::find()->where(['person_id' => $id])->one();

        return $this->render('view', [
            'instructor' => $this->findModel($id),
            'person' => $person
        ]);
    }

    /**
     * Creates a new Instructor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $person = new Person();
        $instructor = new Instructor();

        // Hardcoded for time being
        $person->person_type_id = 2;

        if ($person->load(Yii::$app->request->post()) && $person->save()) {
            // Assigning the person_id to the instructor_id will keep the data consistent
            $instructor->instructor_id = $person->person_id;
        }

        $instructor->instructor_id = $person->person_id;

        if ($instructor->load(Yii::$app->request->post()) && $instructor->save()) {
            return $this->redirect(['view', 'id' => $instructor->instructor_id]);
        }

        return $this->render('create', [
            'person' => $person,
            'instructor' => $instructor,
        ]);
    }

    /**
     * Updates an existing Instructor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        // Before we can edit the Instructor we need to find the associated supertype Person
        $person =  Person::find()->where(['person_id' => $id])->one();
        $instructor = $this->findModel($id);

        if ($person->load(Yii::$app->request->post()) && $person->save() && $instructor->load(Yii::$app->request->post()) && $instructor->save()) {
            return $this->redirect(['view', 'id' => $instructor->instructor_id]);
        }

        return $this->render('update', [
            'person' => $person,
            'instructor' => $instructor,
        ]);
    }

    /**
     * Deletes an existing Instructor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        // We need to delete the Person as well as the Instructor without redirecting to the index page of Person
        PersonController::actionDeleteWithoutRedirect($id);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Instructor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Instructor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Instructor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
