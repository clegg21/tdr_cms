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

        if ($person->load(Yii::$app->request->post()) && $person->save()) {
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
