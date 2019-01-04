<?php

namespace app\controllers;

use Yii;
use app\models\Person;
use app\models\CompanyContact;
use app\models\CompanyContactSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompanyContactController implements the CRUD actions for CompanyContact model.
 */
class CompanyContactController extends PersonController
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
     * Lists all CompanyContact models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanyContactSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CompanyContact model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $person =  Person::find()->where(['person_id' => $id])->one();

        return $this->render('view', [
            'company_contact' => $this->findModel($id),
            'person' => $person
        ]);
    }

    /**
     * Creates a new CompanyContact model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $person = new Person();
        $company_contact = new CompanyContact();

        if ($person->load(Yii::$app->request->post()) && $person->save()) {
            $company_contact->company_contact_id = $person->person_id;
        }

        $company_contact->company_contact_id = $person->person_id;

        if ($company_contact->load(Yii::$app->request->post()) && $company_contact->save()) {
            return $this->redirect(['view', 'id' => $company_contact->company_contact_id]);
        }

        return $this->render('create', [
            'person' => $person,
            'company_contact' => $company_contact,
        ]);
    }

    /**
     * Updates an existing CompanyContact model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $person =  Person::find()->where(['person_id' => $id])->one();
        $company_contact = $this->findModel($id);

        if ($person->load(Yii::$app->request->post()) && $person->save() && $company_contact->load(Yii::$app->request->post()) && $company_contact->save()) {
            return $this->redirect(['view', 'id' => $company_contact->company_contact_id]);
        }

        return $this->render('update', [
            'person' => $person,
            'company_contact' => $company_contact,
        ]);
    }

    /**
     * Deletes an existing CompanyContact model.
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
     * Finds the CompanyContact model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CompanyContact the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CompanyContact::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
