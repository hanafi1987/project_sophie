<?php
namespace frontend\models;

use yii\db\Query;
use yii\db\ActiveRecord;
use yii\web\Session;


class Products extends ActiveRecord
{


    public static function tableName()
    {
        return 'soph_products';
    }


    public function listProducts()
    {
        $session = new Session();
        $session->open();
        if ($session['sorted_value']) {
            if ($session['sorted_value'] == 'def') {
                $sorted_value = "RAND()";
            } else {
                $sorted_value = 'a.' . str_replace('.', ' ', $session['sorted_value']);
            }
        } else {
            $sorted_value = "RAND()";
        }
        $productAll = (new Query())->select('a.id as product_id, a.unit_price, a.discount, a.name as product_name, b.name as brand_name, d.img_path')->from('soph_products a')
            ->leftJoin('soph_brands b', 'b.id = a.brand_id')
            ->leftJoin('soph_img d', 'a.id=d.base_id')
            ->where('d.param_img = 13')
            ->andWhere('a.flag=0')
            ->groupBy('d.base_id')
            ->orderBy($sorted_value)->all();
        return $productAll;
    }

    public function listProductSort($sorted_value)
    {
        $session = new Session();
        $session->open();
        if (!$session['sorted_value']) {
            $session['sorted_value'] = $sorted_value;
        }
        if ($sorted_value == 'def') {

            $sorted_value = "RAND()";
        } else {
            $sorted_value = 'a.' . str_replace('.', ' ', $sorted_value);
        }

        $productAll = (new Query())->select('a.id as product_id, a.unit_price, a.discount, a.name as product_name, b.name as brand_name, d.img_path')->from('soph_products a')
            ->leftJoin('soph_brands b', 'b.id = a.brand_id')
            ->leftJoin('soph_img d', 'a.id=d.base_id')
            ->where('d.param_img = 13')
            ->groupBy('d.base_id')
            ->orderBy($sorted_value)
            ->andWhere('a.flag=0')->all();
        return $productAll;
    }
}