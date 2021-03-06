<?php

namespace app\controllers;

use app\models\Person;
use app\models\ParentGuardian;
use Yii;
use app\models\Relationship;
use app\models\RelationshipSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RelationshipController implements the CRUD actions for Relationship model.
 */
class RelationshipController extends Controller
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
     * Lists all Relationship models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RelationshipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Relationship model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $relationship = $this->findModel($id);
        $learner =  Person::find()->where(['person_id' => $relationship->student_id])->one();
        $parent_guardian =  ParentGuardian::find()->where(['parent_guardian_id' => $relationship->parent_guardian_id])->one();
        $parent_guardian_person =  Person::find()->where(['person_id' => $relationship->parent_guardian_id])->one();

        return $this->render('view', [
            'relationship' => $relationship,
            'learner' => $learner,
            'parent_guardian' => $parent_guardian,
            'parent_guardian_person' => $parent_guardian_person
        ]);
    }

    /**
     * Creates a new Relationship model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $relationship = new Relationship();

        if ($relationship->load(Yii::$app->request->post()) && $relationship->save()) {
            return $this->redirect(['view', 'id' => $relationship->relationship_id]);
        }

        return $this->render('create', [
            'relationship' => $relationship,
        ]);
    }

    /**
     * Updates an existing Relationship model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $relationship = $this->findModel($id);

        if ($relationship->load(Yii::$app->request->post()) && $relationship->save()) {
            return $this->redirect(['view', 'id' => $relationship->relationship_id]);
        }

        return $this->render('update', [
            'relationship' => $relationship,
        ]);
    }

    /**
     * Deletes an existing Relationship model.
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
     * Finds the Relationship model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Relationship the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Relationship::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
