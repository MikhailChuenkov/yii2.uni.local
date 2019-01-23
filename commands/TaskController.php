<?php


namespace app\commands;


use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\console\Controller;

class TaskController extends Controller
{
    //const EVENT_SEND_EMAIL = 'sendEmail';
    /**
     * Test Task
     */
    public function actionFind()
    {
        $tasks = \Yii::$app->db->createCommand("
        SELECT id, date FROM tasks WHERE date - CURRENT_DATE = 1 
        ")->queryAll();
        if($tasks != NULL){
        foreach ($tasks as $task) {
            //Событие должно выстрелить

        echo $task['id'];
        }
        }
    }



}