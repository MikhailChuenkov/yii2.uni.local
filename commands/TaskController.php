<?php


namespace app\commands;


use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\console\Controller;

class TaskController extends Controller
{
    /**
     * Test Task
     */
    public function actionFind()
    {
        $tasks = \Yii::$app->db->createCommand("
        SELECT date FROM tasks WHERE date >= '2019-01-14'
        ")->queryAll();
        echo $tasks[0]['date'];
    }

}