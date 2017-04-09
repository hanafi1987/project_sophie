<?php
namespace backend\models;

use Yii;

use yii\helpers\Url;
use yii\db\Query;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\behaviors\AttributeBehavior;

class Supplier extends ActiveRecord
{
    public $supplier_name;
    public $imageFile;
    const SCENARIO_UPDATE = 'update';

    public static function tableName()
    {
        return 'soph_supplier';
    }


    public function listSupplier()
    {
        $supplierAll = (new Query())->select('a.*, b.base_id, b.img_path')->from('soph_supplier a')->leftJoin('soph_img b', 'a.id = b.base_id')->where('b.param_img = 2')->andWhere('a.flag=0')->orderBy('a.created_at', 'DESC')->all();
        return $supplierAll;
    }

    public function findSupplier($id)
    {
        $supplierOne = (new Query())->select('a.*, b.base_id, b.img_path')->from('soph_supplier a')->leftJoin('soph_img b', 'a.id = b.base_id')->where('b.param_img = 2')->andWhere('a.id=' . $id)->andWhere('a.flag=0')
            ->orderBy('a.created_at', 'ASC')->one();
        return $supplierOne;
    }

    public function createSupplier($data, $file)
    {
        $supplier = new Supplier();
        $supplier->name = $data['Supplier']['supplier_name'];
        $supplier->created_by = Yii::$app->user->identity->id;
        $supplier->flag = 0;
        if ($supplier->save(false)) {
            $insert_id = $supplier->id;
            $img = new Img();
            $img->newImg($file, $insert_id, 'brd');
            return true;
        } else {
            return false;
        }

    }

    public function updateSupplier($data, $id, $file)
    {
        $supplier = self::findOne($id);
        $supplier->name = $data['Supplier']['supplier_name'];
        $supplier->updated_by = Yii::$app->user->identity->id;
        $supplier->flag = 0;
        if ($supplier->save(false)) {
            if (isset($file)) {
                $img = new Img();
                $img->updateImg($file, $id);
            }
            return true;
        } else {
            return false;
        }

    }

    public function deleteSupplier($id)
    {
        $supplier = self::findOne(['id' => $id]);
        $supplier->flag = '1';
        $supplier->save(false);
    }

    function getBrandName($id){
        $supplier = self::findOne(['id'=>$id]);
        return $supplier;
    }
    /**
     * @var UploadedFile
     */

    public function upload()
    {
        $path = 'uploads/supplier/' . date('YMD');
        FileHelper::createDirectory($path, $mode = 0777, $recursive = true);
        $full_path = $path . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
        $path2 = Url::to('@frontend/web/') . 'uploads/supplier/' . date('YMD');
        FileHelper::createDirectory($path2, $mode = 0777, $recursive = true);
        $this->imageFile->saveAs($path . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension, false);
        $this->imageFile->saveAs($path2 . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);

        $img = new Img();
        $img->name = $this->imageFile->name;
        $img->size = $this->imageFile->size;
        $img->type = $this->imageFile->type;
        $img->folder_path = $path;
        $img->img_path = $full_path;

        return $img;
    }

    public function listSupplierSelect($id)
    {
        $supplier = (new Query())->select('id, name')->from('soph_supplier')->andWhere('flag=0')->orderBy('name', 'ASC')->all();
        foreach ($supplier as $supplier) {
            $selected = '';
            if ($supplier['id'] == $id) {
                $selected = 'selected';
            }
            echo '<option value="' . $supplier['id'] . '" ' . $selected . '>' . $supplier['name'] . '</option>';
        };
    }

    public function getNumberOfSupplier(){
        $count = self::find()->where('flag=0')->count();
        return $count;
    }


    public function rules()
    {
        return [
            ['supplier_name', 'required', 'message' => 'Please fill in the Brand Name.'],
            ['imageFile', 'image', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'wrongExtension' => 'Only JPG and PNG allowed', 'except' => self::SCENARIO_UPDATE]
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