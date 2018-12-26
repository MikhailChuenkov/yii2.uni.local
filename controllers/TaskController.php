<?php


namespace app\controllers;


use app\models\tables\Tasks;
use yii\web\Controller;
use app\models\filters\TasksSearch;


class TaskController extends Controller
{
    public function actionIndex()
    {
/*
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
*/
        $model = new Tasks();
        $searchModel = new TasksSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index',[
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}