<?php
namespace frontend\models;

use Yii;
use yii\db\Query;
use yii\db\ActiveRecord;

class ShipConfig extends ActiveRecord
{

    public static function tableName()
    {
        return 'soph_shipconfig';
    }


    public function getShipConf()
    {
        $shipconfigAll = (new Query())->select('a.id as shipconf_id, a.countries_id, b.name as country_name, min_purchase, min_quantity, normal_fees')
            ->from('soph_shipconfig a')
            ->leftJoin('soph_countries b', 'a.countries_id = b.id')
            ->andWhere('a.flag=0')
            ->orderBy('b.sortname', 'ASC')
            ->all();
        return $shipconfigAll;
    }

}