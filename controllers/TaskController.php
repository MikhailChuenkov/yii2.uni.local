<?php


namespace app\controllers;


use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\data\ActiveDataProvider;
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

        $model = new Tasks();
        $searchModel = new TasksSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        return $this->render('index',[
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
*/
        $dataProvider = new ActiveDataProvider([
           'query' => Tasks::find()
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOne($id)
    {
        var_dump($id);
        
    }

    /**
     * Creates a new Tasks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tasks();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'usersList' => Users::getUsersList(),
        ]);
    }
}