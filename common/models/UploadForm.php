<?php
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $path = 'uploads/'. date('YMD');
            FileHelper::createDirectory($path, $mode = 0777, $recursive = true);
            $full_path = $path .'/'. $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($path .'/'. $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return $full_path;
        } else {
            return false;
        }
    }
}

?>