<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>



<h1><?='asfsfsfsfsd'?></h1>
<?
  echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => 'view',
  ]);
?>