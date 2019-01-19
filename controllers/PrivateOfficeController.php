<?php


namespace app\controllers;


use app\models\tables\Tasks;
use app\models\Upload;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;

class PrivateOfficeController extends Controller
{
    public function actionIndex()
    {

        $userId = \Yii::$app->user->id;
        $cache = \Yii::$app->cache;
        $key = "user_tasksList_" . $userId;
        $query = Tasks::find()
            ->where(['responsible_id' => $userId]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        \Yii::$app->db->cache(function () use ($dataProvider){
            return $dataProvider->prepare();
        }, 200);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            //'tasksList' => $tasksList,
            'username' => \Yii::$app->user->getIdentity()->username,
        ]);
    }

    public function actionTask($id)
    {
        //var_dump($id);
        $request = \Yii::$app->request;
        //$idTask = $request->post('id');
        //var_dump($id);
        $model = new Tasks();
        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()
                ->where(['id' => $id])
        ]);

        $modelFile = new Upload();

        if ($modelFile->load(\Yii::$app->request->post())) {
            $modelFile->file = UploadedFile::getInstance($modelFile, 'file');
            $modelFile->upload();
        }

        $request = \Yii::$app->request;
        $taskId = $request->get('id');

        return $this->render('indexOne', [
            'dataProvider' => $dataProvider,
            'model' => $model,
            'modelFile' => $modelFile,
            'username' => \Yii::$app->user->getIdentity()->username,
            'filenameBase' => $modelFile->filenameBase,
            'id' => \Yii::$app->user->id,
            'idTask' => $taskId,
            'fileExtension' => $modelFile->fileExtension,
        ]);

    }



}