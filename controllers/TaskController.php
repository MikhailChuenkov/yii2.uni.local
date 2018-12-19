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
                    'userName' => 'Mikhail',
                    'taskName' => 'Create Model TaskCard',
                    'taskStatus' => 1,
                    'deadline' => '20.12.18',
                    'timeStart' => '18.12.18',
                    'timeEnd' => '19.12.18',
                ]
            ]
        );
        var_dump($modelTask->validate());
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