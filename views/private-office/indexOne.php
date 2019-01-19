<?php
/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
/* @var $modelFile  */

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

/**
 * @var \app\models\Upload $model
 */

$form = \yii\widgets\ActiveForm::begin();
echo $form->field($modelFile, 'content')->textInput();
echo $form->field($modelFile, 'file')->fileInput();
echo \yii\helpers\Html::submitButton("Отправить");
\yii\widgets\ActiveForm::end();


?>

<img src="img/small/<?=$filenameBase. "_" . $id . "_" . $idTask ."." . $fileExtension?>" alt="">

