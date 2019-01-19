<?php



/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */



$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;

?>
<p>Привет, <?=$username?>!</p>
<?
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


?>