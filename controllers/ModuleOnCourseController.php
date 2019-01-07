<?php

namespace app\controllers;

use Yii;
use app\models\Course;
use app\models\Module;
use app\models\ModuleOnCourse;
use app\models\ModuleOnCourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ModuleOnCourseController implements the CRUD actions for ModuleOnCourse model.
 */
class ModuleOnCourseController extends Controller
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
     * Lists all ModuleOnCourse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModuleOnCourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ModuleOnCourse model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $module_on_course = $this->findModel($id);
        $course = Course::find()->where(['course_id' => $module_on_course->course_id])->one();
        $module = Module::find()->where(['module_id' => $module_on_course->module_id])->one();

        return $this->render('view', [
            'module_on_course' => $module_on_course,
            'course' => $course,
            'module' => $module,
        ]);
    }

    /**
     * Creates a new ModuleOnCourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $module_on_course = new ModuleOnCourse();
        $course = new Course();
        $module = new Module();

        if ($module_on_course->load(Yii::$app->request->post()) && $module_on_course->save()) {
            return $this->redirect(['view', 'id' => $module_on_course->course_module_id]);
        }

        return $this->render('create', [
            'module_on_course' => $module_on_course,
            'course' => $course,
            'module' => $module,
        ]);
    }

    /**
     * Updates an existing ModuleOnCourse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $module_on_course = $this->findModel($id);
        $course = Course::find()->where(['course_id' => $module_on_course->course_id])->one();
        $module = Module::find()->where(['module_id' => $module_on_course->module_id])->one();

        if ($module_on_course->load(Yii::$app->request->post()) && $module_on_course->save()) {
            return $this->redirect(['view', 'id' => $module_on_course->course_module_id]);
        }

        return $this->render('update', [
            'module_on_course' => $module_on_course,
            'course' => $course,
            'module' => $module,
        ]);
    }

    /**
     * Deletes an existing ModuleOnCourse model.
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
     * Finds the ModuleOnCourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ModuleOnCourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ModuleOnCourse::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
