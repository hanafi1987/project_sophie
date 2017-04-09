<?php
namespace backend\models;

use Yii;
use yii\helpers\Url;
use yii\db\Query;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\behaviors\AttributeBehavior;

class Banners extends ActiveRecord
{
    public $banner_title;
    public $display;
    public $imageFile;
    const SCENARIO_UPDATE = 'update';

    public static function tableName()
    {
        return 'soph_banners';
    }


    public function listBanners()
    {
        $bannerAll = (new Query())->select('a.*, b.base_id, b.img_path')->from('soph_banners a')->leftJoin('soph_img b', 'a.id = b.base_id')->where('b.param_img = 1')->andWhere('a.flag=0')->orderBy('a.updated_at', 'DESC')->all();
        return $bannerAll;
    }

    public function findBanner($id)
    {
        $bannerOne = (new Query())->select('a.*, b.base_id, b.img_path')->from('soph_banners a')->leftJoin('soph_img b', 'a.id = b.base_id')->where('b.param_img = 1')->andWhere('a.id=' . $id)->andWhere('a.flag=0')
            ->orderBy('a.created_at', 'ASC')->one();
        return $bannerOne;
    }

    public function createBanner($data, $file)
    {

        $banner = new Banners();
        $banner->name = $data['Banners']['banner_title'];
        $banner->url = $data['Banners']['url'];
        if (isset($data['Banners']['display'])) {
            $status = 0;
        } else {
            $status = 1;
        }
        $banner->status = $status;
        $banner->created_by = Yii::$app->user->identity->id;
        $banner->flag = 0;
        $this->display = $status;
        if ($banner->save(false)) {
            $insert_id = $banner->id;
            $img = new Img();
            $img->newImg($file, $insert_id, 'bnr');
            return true;
        } else {
            return false;
        }

    }

    public function updateBanner($data, $id, $file)
    {
        $banner = self::findOne($id);
        $banner->name = $data['Banners']['banner_title'];
        $banner->url = $data['Banners']['url'];
        if (isset($data['Banners']['display'])) {
            $status = 0;
        } else {
            $status = 1;
        }
        $banner->status = $status;
        $banner->updated_by = Yii::$app->user->identity->id;
        $banner->flag = 0;
        $this->display = $status;
        if ($banner->save(false)) {
            if (isset($file)) {
                $img = new Img();
                $img->updateImg($file, $id);
            }

            return true;
        } else {
            return false;
        }

    }

    public function deleteBanner($id)
    {
        $banner = self::findOne(['id' => $id]);
        $banner->flag = '1';
        $banner->save(false);
    }

    /**
     * @var UploadedFile
     */

    public function upload()
    {
        $path = 'uploads/' . date('YMD');
        FileHelper::createDirectory($path, $mode = 0777, $recursive = true);
        $full_path = $path . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
        $path2 = Url::to('@frontend/web/') . 'uploads/' . date('YMD');
        FileHelper::createDirectory($path2, $mode = 0777, $recursive = true);

        $this->imageFile->saveAs($path2 . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension, false);
        $this->imageFile->saveAs($path . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);

        $img = new Img();
        $img->name = $this->imageFile->name;
        $img->size = $this->imageFile->size;
        $img->type = $this->imageFile->type;
        $img->folder_path = $path;
        $img->img_path = $full_path;

        return $img;
    }


    public function getNumberOfBanners(){
        $count = self::find()->where('flag=0')->count();
        return $count;
    }
    public function rules()
    {
        return [
            ['banner_title', 'required', 'message' => 'Please fill in the Title.'],
            ['url', 'url', 'skipOnEmpty' => true],
            ['imageFile', 'image', 'maxWidth' => 1150, 'maxHeight' => 450, 'maxSize' => 1150 * 450 * 2, 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'wrongExtension' => 'Only JPG and PNG allowed', 'except' => self::SCENARIO_UPDATE]
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => function () {
                    return date('Y-m-d H:i:s');
                },
            ],
        ];
    }
}