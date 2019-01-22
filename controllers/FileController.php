<?php


namespace app\controllers;


use app\models\Upload;
use yii\web\Controller;
use yii\web\UploadedFile;

class FileController extends Controller
{
    public function actionIndex()
    {
        $model = new Upload();

        if ($model->load(\Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->upload();
        }

        return $this->render('index', ['model'=>$model]);
        
    }
    public function actionI18n()
    {
        // \Yii::$app->language = "ru";
        // echo \Yii::t("main", "error", ['number' => 404]);
        echo \Yii::t('main', 'cats', ['n' => 10]);
        exit;
    }

}