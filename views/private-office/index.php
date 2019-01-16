<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\tables\Tasks */

/*

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
*/
?>

<p>Привет, <?=$username?>!</p>

<?
//$model = \app\models\tables\Tasks::findOne(2);
//var_dump($model);
$key = 'task_' . $model->id;
var_dump($model->id);
if($this->beginCache($key, [
    'duration' => 200,
])){

echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function($model){
  return
      \app\widgets\TaskPreview::widget([
      'model' => $model
  ]);
    },
    'summary' => false,
    'options' => [
            'class' => 'preview-container'
    ]
  ]);
$this->endCache();
}

?>