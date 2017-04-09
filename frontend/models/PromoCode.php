<?php
namespace frontend\models;

use yii\db\ActiveRecord;

class PromoCode extends ActiveRecord
{


    public static function tableName()
    {
        return 'soph_promocode';
    }


    public function findPromoCode($promocode)
    {
        $promocodeOne = self::findOne(['promo_code'=>$promocode]);
        if($promocodeOne){
            $arrayPromo = array("code"=>0, "id"=>$promocodeOne->id, "promo_code"=>$promocodeOne->promo_code, "params"=>$promocodeOne->params);
        }else{
            $arrayPromo  = array("code"=>1);
        }

        return $arrayPromo;
    }


}