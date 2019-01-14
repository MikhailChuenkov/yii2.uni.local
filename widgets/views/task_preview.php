<?php

/**
 * @var $model \app\models\tables\Tasks
 */
?>

<div class="task-container">
    <a href="<?= \yii\helpers\Url::to(['task/one', 'id' => $model->id])?>" class="task-preview-link">
        <div class="task-preview">
            <div class="task-preview-header"><?= $model->name?></div>
            <div class="task-preview-content"><?= $model->description?></div>
            <div class="task-preview-user"><?= $model->responsible->name?></div>
        </div>
    </a>
</div>

