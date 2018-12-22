<?php


namespace app\controllers;


use app\models\tables\Tasks;
use app\models\tables\Users;
use app\models\User;
use yii\web\Controller;
use yii\db;

class DbController extends Controller
{
    public function actionIndex()
    {
        /*
        \Yii::$app->db->createCommand("
            INSERT INTO test (title, content) VALUES 
            ('Монитор','Черный')
        ")->execute();
        */
        /*
        $res = \Yii::$app->db->createCommand("
            SELECT title FROM test
        ")->queryColumn();
        var_dump($res);
        */
        $res = \Yii::$app->db->createCommand("
            SELECT COUNT(title) FROM test
        ")->queryScalar();
        var_dump($res);
    }

    public function actionAr()
    {
        /*
        $model = new Tasks();
        $model->name = "Важная задача";
        $model->description = "Сделай важное дело";
        $model->date = date("Y-m-d");
        $model->responsible_id = 3;
        $model->save();
        */

        $model = Tasks::findOne(2);
        var_dump($model);
    }

    public function actionFind()
    {
        /*
        $tasks = Tasks::find();
        var_dump($tasks);

        $query = new db\Query();

        $query->select(['id', 'name'])
            ->from('tasks');
        var_dump($query);*/

        $tasks = Users::findOne(2);
        var_dump($tasks->user);
    }
}