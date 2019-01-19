<?php


namespace app\models;


use app\models\tables\Tasks;
use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;

class Upload extends Model
{
    public $title;
    public $content;
    public $filenameBase;
    public $fileExtension;
    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return[
            [['content'], 'safe'],
            [['file'], 'file', 'extensions' => 'png, jpg']
        ];
        
    }

    public function upload()
    {
        if ($this->validate()){
        $userId = \Yii::$app->user->id;
            $request = \Yii::$app->request;
            $taskId = $request->get('id');
            //var_dump($taskId);
        $filename = $this->file->getBaseName() . "_" . $userId . "_" . $taskId . "." . $this->file->getExtension();
        $this->filenameBase = $this->file->getBaseName();
        $this->fileExtension = $this->file->getExtension();
        $filepath = \Yii::getAlias("@img/{$filename}");
        $this->file->saveAs($filepath);

        Image::thumbnail($filepath, 120, 120)
            ->save(\Yii::getAlias("@img/small/{$filename}"));
        }
    }

}