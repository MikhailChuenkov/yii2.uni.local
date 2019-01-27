<?php


namespace app\commands;


use yii\console\Controller;

class RbacController extends Controller
{
    public function actionIndex()
    {
        $authManager = \Yii::$app->authManager;

        $admin = $authManager->createRole('admin');
        $moder = $authManager->createRole('moderator');

        $authManager->add($admin);
        $authManager->add($moder);

        $permissionTaskCreate = $authManager->createPermission('TaskCreate');
        $permissionTaskDelete = $authManager->createPermission('TaskDelete');
        $permissionTaskEdit = $authManager->createPermission('TaskEdit');

        $authManager->add($permissionTaskCreate);
        $authManager->add($permissionTaskDelete);
        $authManager->add($permissionTaskEdit);

        $authManager->addChild($admin, $permissionTaskCreate);
        $authManager->addChild($admin, $permissionTaskDelete);
        $authManager->addChild($admin, $permissionTaskEdit);

        $authManager->addChild($moder, $permissionTaskCreate);
        $authManager->addChild($moder, $permissionTaskEdit);

        $authManager->assign($admin, 1);
        $authManager->assign($moder, 2);
    }

    public function actionWatching($id)
    {
        $authManager = \Yii::$app->authManager;
        $watching = $authManager->createRole('watching');
        $authManager->add($watching);
        $permissionTaskComment = $authManager->createPermission('TaskNotComment');
        $authManager->add($permissionTaskComment);

        $authManager->addChild($watching, $permissionTaskComment);

        $authManager->assign($watching, $id);

    }

    public function actionAddModer($id)
    {
        $authManager = \Yii::$app->authManager;
        $moder = $authManager->getRole('moderator');
        $authManager->assign($moder, $id);
    }

}