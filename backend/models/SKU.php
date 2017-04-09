<?php
namespace backend\models;

use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;

class SKU extends ActiveRecord
{
    public $sku;
    public $qtty;


    public static function tableName()
    {
        return 'soph_sku';
    }


    public function newSKU($product_id, $serial, $quantity)
    {
        $sku = new SKU();
        $sku->product_id = $product_id;
        $sku->sku_serial = $serial;
        $sku->quantity = $quantity;
        $sku->flag = 0;
        $sku->save();
    }

    public function updateSKU($product_id, $serial, $quantity)
    {
        $sku = self::findOne(['product_id' => $product_id]);
        $sku->sku_serial = $serial;
        $sku->quantity = $quantity;
        $sku->save();
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