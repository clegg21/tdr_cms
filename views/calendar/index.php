<?php $this->title = 'Timetable'; ?>
<div class="site-index">

    <h1>Timetable</h1>
    <p>
        <?php

        $events_for_calendar = [];
        foreach ($calendar_entries as $entry)
        {
            $calendar_event = new \yii2fullcalendar\models\Event();
            $calendar_event->id = $entry['event_timetable_slot_person_id'];
            $calendar_event->title = \app\models\Event::find()->where(['event_id'=>$entry['event_id']])->one()->description;
            $calendar_event->start = \app\models\TimetableSlot::find()->where(['timetable_slot_id'=>$entry['timetable_slot_id']])->one()->start_date;
            $calendar_event->end = \app\models\TimetableSlot::find()->where(['timetable_slot_id'=>$entry['timetable_slot_id']])->one()->end_date;
            $events_for_calendar[] = $calendar_event;
        }
        ?>
        <?= \yii2fullcalendar\yii2fullcalendar::widget(array('events'=> $events_for_calendar,)); ?>
    </p>
</div>