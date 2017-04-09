<?php
namespace frontend\models;

use yii\db\Query;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;
use frontend\models\Shoppingcart;

class Order extends ActiveRecord
{


    public static function tableName()
    {
        return 'soph_order';
    }


    public function createOrder($carts, $total, $ordertotal, $shipfee, $discounts, $promotioncode, $secretkey, $country)
    {
        $scarts = new Shoppingcart();
        $scarts->placeOrder($carts);

        $orderModel = new Order();
        $orderModel->shoppingcart = json_encode($carts);
        $orderModel->total = $total;
        $orderModel->order_total = $ordertotal;
        $orderModel->shipping_fee = $shipfee;
        $orderModel->discounts = $discounts;
        $orderModel->promo_code = $promotioncode;
        $orderModel->secret_key = $secretkey;
        $orderModel->shipping_country = $country;
        $orderModel->flag = 0;
        $orderModel->save();

        return $orderModel->id;
    }

    public function getOrder($id, $secret_key)
    {
        $orderModel = (new Query())->select('a.*, b.name')->from('soph_order a')
            ->leftJoin('soph_countries b', 'a.shipping_country=b.id')
            ->where('a.id=' . $id)
            ->andWhere('a.secret_key = "' . $secret_key . '"')
            ->andWhere('a.flag=0')->one();
        return $orderModel;
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