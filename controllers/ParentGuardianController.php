<?php

namespace app\controllers;

use Yii;
use app\models\Person;
use app\models\ParentGuardian;
use app\models\ParentGuardianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParentGuardianController implements the CRUD actions for ParentGuardian model.
 */
class ParentGuardianController extends Controller
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
     * Lists all ParentGuardian models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ParentGuardianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ParentGuardian model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        // Before we can render the Parent/Guardian we need to find the associated supertype Person
        $person =  Person::find()->where(['person_id' => $id])->one();

        return $this->render('view', [
            'parent_guardian' => $this->findModel($id),
            'person' => $person
        ]);
    }

    /**
     * Creates a new ParentGuardian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $person = new Person();
        $parent_guardian = new ParentGuardian();

        // Hardcoded for time being
        $person->person_type_id = 3;

        if ($person->load(Yii::$app->request->post()) && $person->save()) {
            // Assigning the person_id to the parent_guardian_id will keep the data consistent
            $parent_guardian->parent_guardian_id = $person->person_id;
        }

        $parent_guardian->parent_guardian_id = $person->person_id;

        if ($parent_guardian->load(Yii::$app->request->post()) && $parent_guardian->save()) {
            return $this->redirect(['view', 'id' => $parent_guardian->parent_guardian_id]);
        }

        return $this->render('create', [
            'person' => $person,
            'parent_guardian' => $parent_guardian,
        ]);
    }

    /**
     * Updates an existing ParentGuardian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        // Before we can edit the Parent/Guardian we need to find the associated supertype Person
        $person =  Person::find()->where(['person_id' => $id])->one();
        $parent_guardian = $this->findModel($id);

        if ($person->load(Yii::$app->request->post()) && $person->save() && $parent_guardian->load(Yii::$app->request->post()) && $parent_guardian->save()) {
            return $this->redirect(['view', 'id' => $parent_guardian->parent_guardian_id]);
        }

        return $this->render('update', [
            'person' => $person,
            'parent_guardian' => $parent_guardian,
        ]);
    }

    /**
     * Deletes an existing ParentGuardian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        // We need to delete the Person as well as the Parent/Guardian without redirecting to the index page of Person
        PersonController::actionDeleteWithoutRedirect($id);

        return $this->redirect(['index']);
    }

    /**
     * Finds the ParentGuardian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ParentGuardian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ParentGuardian::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
