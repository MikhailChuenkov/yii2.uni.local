<?php


namespace app\components;


use app\commands\TaskController;
use app\models\tables\Tasks;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;

class Bootstrap extends Component implements BootstrapInterface
{
    /** @var  Application */
    protected $app;

    public function bootstrap($app)
    {
        $this->app = $app;
        $this->setLang();
        $this->attachEventsHandlers();
        $this->attachSendEmail();
    }

    protected function setLang()
    {
        $this->app->language = $this->app->session->get('lang');
    }

    protected function attachEventsHandlers(){
        Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT, function ($event){

            $task = $event->sender;
            $user = $task->responsible;

            \Yii::$app->mailer->compose()
                ->setTo($user->email)
                ->setFrom("admin@mail.ru")
                ->setSubject("Became new task")
                ->setTextBody("Urgent task to perform {$task->name}")
                ->send();
        });

}

    protected function attachSendEmail(){
        echo 'sdfsfsdf';

        Event::on(TaskController::class, TaskController::EVENT_SEND_EMAIL, function ($event){
            //$task = $event->sender;
            //$user = $task->responsible;
            echo 'sdfsfsdf';

            \Yii::$app->mailer->compose()
                ->setTo('sefs'/*$user->email*/)
                ->setFrom('admin@mail.ru')
                ->setSubject("На выполнение задачи остается менее суток")
                ->setTextBody("Пожалуйста активизируйтесь!")
                ->send();
        });

}

}