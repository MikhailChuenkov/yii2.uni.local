<?php


namespace app\commands;


use app\models\tables\Tasks;
use yii\console\Controller;
use yii\db\ActiveQuery;

class TaskController extends Controller
{
    /**
     * Test Task
     */
    public function actionFind()
    {
        /*
        $query = \Yii::$app->db->createCommand("
        SELECT id, name, date, responsible_id FROM tasks WHERE date - CURRENT_DATE = 1 
        ")->queryAll();
        if($query != NULL){
        foreach ($query as $task) {
            $queryUserEmail = \Yii::$app->db->createCommand("
        SELECT email FROM users WHERE id = {$task['responsible_id']} 
        ")->queryAll();
            $userEmail = $queryUserEmail[0]['email'];
            $taskName = $task['name'];
            $model = new Tasks();
            $model->on(Tasks::EVENT_SEND_EMAIL, function () use ($taskName, $userEmail){
                \Yii::$app->mailer->compose()
                    ->setTo($userEmail)
                    ->setFrom('admin@mail.ru')
                    ->setSubject("На выполнение задачи {$taskName} остается менее суток")
                    ->setTextBody("Пожалуйста активизируйтесь!")
                    ->send();
            });

            $model->sendEmail();

        echo $task['id'];
        }
        }
*/
        /**
         * @var ActiveQuery $tasks
         */
        $tasks = Tasks::find()
            ->where('DATEDIFF(NOW(), tasks.date) = -1')
            ->with('responsible')
            ->all();
        foreach ($tasks as $task){
            \Yii::$app->mailer->compose()
                ->setTo($task->responsible->email)
                ->setFrom('admin@mail.ru')
                ->setSubject("На выполнение задачи {$task->name} остается менее суток")
                ->setTextBody(" Quicker! ")
                ->send();
            echo $task->id;
        }
    }

}