<?php

namespace app\controllers;

use app\models\EventTimetableSlotPerson;
use yii\web\Controller;

/**
 * This controller was created to handle the requests to the Calendar index
 */

class CalendarController extends Controller
{
    public function actionIndex($id)
    {
        // First we need to look up the Person with the id provided and add those results to an array
        $calendar_entries = EventTimetableSlotPerson::find()->asArray()->where(['person_id' => $id])->all();
        // Then pass the array to the index page for rendering
        return $this->render('index',['calendar_entries' => $calendar_entries]);
    }


}