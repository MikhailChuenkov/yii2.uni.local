<?php


namespace app\controllers;


use app\models\ContactForm;
use app\models\TaskCard;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {

        $modelTask = new TaskCard();
        $modelTask->load([
            'TaskCard' =>
                [
                    'userName' => 'w',
                    'taskName' => 'Create Model TaskCard',
                    'taskStatus' => 1,
                    'deadline' => '20.12.18',
                    'timeStart' => '28.12.18',
                    'timeEnd' => date("d.m.y"),
                ]
            ]
        );
        //var_dump($modelTask);
        var_dump($modelTask->getErrors());

        exit;

        //echo("Hello, World!"); exit;
        $this->layout = false;
        //return $this->render('index');
        return $this->render('index',[
            'title' => 'Hello, Mikhail!',
            'content' => 'Let\'s begin.'
        ]);
    }

}