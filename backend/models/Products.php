<?php
namespace backend\models;

use Yii;

use yii\helpers\Url;
use yii\db\Query;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\behaviors\AttributeBehavior;


class Products extends ActiveRecord
{
    public $product_name;
    public $brand;
    public $category;
    public $subcategory;
    public $desc;
    public $unitprice;
    public $discounts;
    public $product_img;
    public $featured;
    public $sku;
    public $quantity;
    public $featuredfile;
    public $display;

    public static function tableName()
    {
        return 'soph_products';
    }


    public function listProducts()
    {
        $productAll = (new Query())->select('a.*, a.status as product_status, a.id as product_id, a.name as product_name, b.id as brand_id, b.name as brand_name, c.name as realname, d.base_id, d.img_path, e.sku_serial, e.quantity')->from('soph_products a')
            ->leftJoin('soph_supplier b', 'b.id = a.brand_id')
            ->leftJoin('soph_users c', 'a.created_by=c.id')
            ->leftJoin('soph_img d', 'a.id=d.base_id')
            ->leftJoin('soph_sku e', 'e.product_id=a.id')
            ->where('d.param_img = 13')
            ->andWhere('a.flag=0')
            ->groupBy('d.base_id')
            ->orderBy('a.updated_at', 'DESC')->all();
        return $productAll;
    }

    public function listProductsLimit($num)
    {
        $product = (new Query())->select('a.*, a.status as product_status, a.id as product_id, a.name as product_name, b.id as brand_id, b.name as brand_name, c.name as realname, d.base_id, d.img_path, e.sku_serial, e.quantity')->from('soph_products a')
            ->leftJoin('soph_supplier b', 'b.id = a.brand_id')
            ->leftJoin('soph_users c', 'a.created_by=c.id')
            ->leftJoin('soph_img d', 'a.id=d.base_id')
            ->leftJoin('soph_sku e', 'e.product_id=a.id')
            ->where('d.param_img = 13')
            ->andWhere('a.flag=0')
            ->limit($num)
            ->orderBy('a.updated_at', 'DESC')->all();
        return $product;
    }

    public function findProduct($id)
    {
        $productOne = (new Query())->select('a.*, a.status as product_status, a.id as product_id,
         a.name as product_name, b.id as brand_id, b.name as brand_name, c.name as realname, d.base_id, d.id as img_id, d.img_path, e.sku_serial, e.quantity')->from('soph_products a')
            ->leftJoin('soph_supplier b', 'b.id = a.brand_id')
            ->leftJoin('soph_users c', 'a.created_by=c.id')
            ->leftJoin('soph_img d', 'a.id=d.base_id')
            ->leftJoin('soph_sku e', 'e.product_id=a.id')
            ->where('d.param_img = 13')
            ->andWhere('a.id=' . $id)
            ->andWhere('a.flag=0')
            ->one();
        return $productOne;
    }

    public function createProduct($data)
    {
        $product = new Products();
        $product->name = $data['Products']['product_name'];
        $product->brand_id = $data['Products']['brand'];
        $product->descriptions = $data['Products']['desc'];
        $product->subcategories = $data['Products']['category'];
        $product->unit_price = $data['Products']['unitprice'];
        $product->discount = $data['Products']['discounts'];
        $product->discount_percentage = self::getPercentage($data['Products']['unitprice'], $data['Products']['discounts']);
        $product->sales_price = self::getSalesPrice($data['Products']['unitprice'], $data['Products']['discounts']);
        if (isset($data['Products']['display'])) {
            $status = 0;
        } else {
            $status = 1;
        }
        $product->status = $status;
        $product->display = $status;
        $product->created_by = Yii::$app->user->identity->id;
        $product->flag = 0;
        if ($product->save(false)) {
            $insert_id = $product->id;
            $img = new Img();
            $img->updateImgById($insert_id, $data['Products']['featuredfile']);

            $sku = new SKU();
            $sku->newSKU($insert_id, $data['Products']['sku'], $data['Products']['quantity']);
            $product->featuredfile = $data['Products']['featuredfile'];
            return true;
        } else {
            return false;
        }

    }

    public function updateProduct($data, $id)
    {
        $product = self::findOne($id);
        $product->name = $data['Products']['product_name'];
        $product->brand_id = $data['Products']['brand'];
        $product->descriptions = $data['Products']['desc'];
        $product->subcategories = $data['Products']['category'];
        $product->unit_price = $data['Products']['unitprice'];
        $product->discount = $data['Products']['discounts'];
        $product->discount_percentage = self::getPercentage($data['Products']['unitprice'], $data['Products']['discounts']);
        $product->sales_price = self::getSalesPrice($data['Products']['unitprice'], $data['Products']['discounts']);
        if (isset($data['Products']['display'])) {
            $status = 0;
        } else {
            $status = 1;
        }
        $product->status = $status;
        $product->display = $status;
        $product->updated_by = Yii::$app->user->identity->id;
        $product->flag = 0;
        if ($product->save(false)) {
            $img = new Img();
            $img->updateImgById($id, $data['Products']['featuredfile']);
            $sku = new SKU();
            $sku->updateSKU($id, $data['Products']['sku'], $data['Products']['quantity']);
            $product->featuredfile = $data['Products']['featuredfile'];

            return true;
        } else {
            return false;
        }

    }

    public function deleteProduct($id)
    {
        $product = self::findOne(['id' => $id]);
        $product->flag = '1';
        $product->save(false);
    }

    /**
     * @var UploadedFile
     */

    public function uploadFeatured()
    {
        $date = date('YMD');
        $path = 'uploads/' . $date . '/featured';
        FileHelper::createDirectory($path, $mode = 0777, $recursive = true);
        $full_path = $path . '/' . $this->featured->name;
        $path2 = Url::to('@frontend/web/') . 'uploads/' . $date . '/featured';
        FileHelper::createDirectory($path2, $mode = 0777, $recursive = true);
        $this->featured->saveAs($path2 . '/' . $this->featured->name, false);
        $this->featured->saveAs($path . '/' . $this->featured->name);

        $img = new Img();
        $img->name = $this->featured->name;
        $img->size = $this->featured->size;
        $img->type = $this->featured->type;
        $img->folder_path = $path;
        $img->img_path = $full_path;
        $new_img = $img->newImg($img, null, 'f_product');
        $imgArray = array("id" => $new_img->id, "img_path" => $new_img->img_path, "name" => $new_img->name, "size" => $new_img->size);

        return $imgArray;
    }

    public function getNumberOfProduct()
    {
        $count = self::find()->where('flag=0')->count();
        return $count;
    }

    public function getPercentage($unit_price, $discount)
    {
        $decdis = 1 - (($unit_price - $discount) / $unit_price);
        $decdis = $decdis * 100;
        return (float)$decdis;
    }

    public function getSalesPrice($unit_price, $discount){
        $salesprice = $unit_price - $discount;
        return (float)$salesprice;
    }

    public function rules()
    {
        return [
            ['product_name', 'required', 'message' => 'Please fill in the Product Name.'],
            ['brand', 'required', 'message' => 'Please select the Product Brand.'],
            ['unitprice', 'required', 'message' => 'Please select the Product Price per Unit.'],
            ['featuredfile', 'required', 'message' => 'Please upload image for Product Featured'],
            ['sku', 'required', 'message' => 'Please enter the SKU.'],
            ['quantity', 'required', 'message' => 'Please enter the quantity.'],
            ['category', 'required', 'message' => 'Please select the Category.'],
            ['desc', 'required', 'message' => 'Please fill in the Product Description.'],
            ['featured', 'image', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'wrongExtension' => 'Only JPG and PNG allowed'],
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