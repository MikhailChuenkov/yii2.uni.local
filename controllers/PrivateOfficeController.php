<?php


namespace app\controllers;


use app\models\tables\Tasks;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class PrivateOfficeController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()->where(['responsible_id' => \Yii::$app->user->id]),
        ]);

/*
        $cache = \Yii::$app->cache;
        $key = 'tasksUser' . \Yii::$app->user->id;
        //var_dump($dataProvider);

        if($cache->exists($key)){
            $tasksUser = $cache->get($key);
            //echo 654;
        } else {
            $tasksUser = $dataProvider;
            $cache->set($key, $tasksUser, 30);
        }
*/
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'username' => \Yii::$app->user->getIdentity()->username,
        ]);
    }



}