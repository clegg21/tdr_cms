<?php

namespace app\controllers;

use app\models\EventTimetableSlotPerson;
use yii\web\Controller;

class CalendarController extends Controller
{
    public function actionIndex($id)
    {
        $calendar_entries = EventTimetableSlotPerson::find()->asArray()->where(['person_id' => $id])->all();
        return $this->render('index',['calendar_entries' => $calendar_entries]);
    }


}