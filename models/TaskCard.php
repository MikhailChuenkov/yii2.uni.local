<?php


namespace app\models;


use yii\base\Model;

class TaskCard extends Model
{
    public $userName;
    public $taskName;
    public $taskStatus;
    public $deadline;
    public $timeStart;
    public $timeEnd;

    public function rules()
    {
        return [
            ['userName', 'string', 'length' => [3, 12]],
            ['taskName', 'string', 'length' => [10, 42]],
            ['taskStatus', 'boolean'],
            ['deadline', 'exist'],
            ['timeStart', 'exist'],
            [['timeEnd','deadline'], 'date'],
        ];
    }
}