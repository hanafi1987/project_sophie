<?php
/**
 * Created by PhpStorm.
 * User: Iza
 * Date: 05/01/2017
 * Time: 12:18 AM
 */

namespace frontend\models;

use yii\db\Query;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;

class Shoppingcart extends ActiveRecord
{

    public static function tableName()
    {
        return 'soph_shoppingcart';
    }

    public function addCart($product_id, $secret, $ipaddress)
    {
        $scart = new Shoppingcart();
        $scart->product_id = $product_id;
        $scart->quantity = 1;
        $scart->ipaddress = $ipaddress;
        $scart->secret_key = $secret;
        $scart->flag = 0;
        $scart->save();
        $count = self::getNumCart($secret);
        return $count;
    }

    public function getShoppingCart($secret)
    {
        $cartAll = (new Query())->select('SUM(a.sales_price) as sum_salesprice, a.sales_price, a.unit_price, a.id as product_id, a.name as product_name,
         b.id as brand_id, b.name as brand_name, d.base_id, d.img_path, f.id as cart_id, f.secret_key, f.id as item_id, count(f.id) as count_cart')
            ->from('soph_products a')
            ->leftJoin('soph_brands b', 'b.id = a.brand_id')
            ->leftJoin('soph_img d', 'a.id=d.base_id')
            ->leftJoin('soph_shoppingcart f', 'f.product_id=a.id')
            ->where('d.param_img = 13')
            ->andWhere('f.secret_key="' . $secret . '"')
            ->andWhere('a.flag=0')
            ->andWhere('f.flag=0')
            ->groupBy('d.base_id, f.product_id')
            ->orderBy('a.updated_at', 'DESC')->all();
        return $cartAll;
    }

    public function getNumCart($secret)
    {
        $curdate = date("Y-m-d H:i:s");
        $scart = self::find()->where(['secret_key' => $secret, 'flag' => 0])->andWhere('created_at BETWEEN "' . $curdate . '" - INTERVAL 1 DAY AND "' . $curdate . '"');
        $count = $scart->count();
        return $count;
    }

    public function placeOrder($carts)
    {
        foreach ($carts as $cart) {
            self::updateAll(['flag' => 1], ['secret_key' => $cart['secret_key'], 'product_id' => $cart['product_id']]);
        }
    }

    public function removeItemFromCart($product_id, $secret)
    {
        self::updateAll(['flag' => 1], 'product_id=' . $product_id);
        $scart = self::getShoppingCart($secret);
        return $scart;
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