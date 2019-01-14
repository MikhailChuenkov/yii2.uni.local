<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/*

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
*/
?>



<?
$model = \app\models\tables\Tasks::findOne(2);

echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function($model){
  return \app\widgets\TaskPreview::widget([
      'model' => $model
  ]);
    },
    'summary' => false,
    'options' => [
            'class' => 'preview-container'
    ]
  ]);

?>