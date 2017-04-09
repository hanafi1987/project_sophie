<?php
namespace backend\models;

use Yii;

use yii\db\Query;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;

class ShipConfig extends ActiveRecord
{
    public $countries;
    public $min_purch;
    public $min_qtty;
    public $fee;
    const SCENARIO_UPDATE = 'update';

    public static function tableName()
    {
        return 'soph_shipconfig';
    }


    public function listShipConfig()
    {
        $shipAll = (new Query())->select('a.*, b.sortname, b.name')->from('soph_shipconfig a')->leftJoin('soph_countries b', 'a.countries_id=b.id')->where('a.flag=0')->orderBy('a.created_at', 'DESC')->all();
        return $shipAll;
    }

    public function findShipConfig($id)
    {
        $shipOne = (new Query())->select('a.*, b.sortname, b.name')->from('soph_shipconfig a')->leftJoin('soph_countries b', 'a.countries_id=b.id')->where('a.id=' . $id)->andWhere('a.flag=0')->one();
        return $shipOne;
    }

    public function createShipConfig($data)
    {
        $ship = new ShipConfig();
        $ship->countries_id = $data['ShipConfig']['countries'];
        $ship->min_purchase = $data['ShipConfig']['min_purch'];
        $ship->min_quantity = $data['ShipConfig']['min_qtty'];
        $ship->normal_fees = $data['ShipConfig']['fee'];
        $ship->created_by = Yii::$app->user->identity->id;
        $ship->flag = 0;
        if ($ship->save(false)) {
            return true;
        } else {
            return false;
        }

    }

    public function updateShipConfig($data, $id)
    {
        $ship = self::findOne($id);
        $ship->countries_id = $data['ShipConfig']['countries'];
        $ship->min_purchase = $data['ShipConfig']['min_purch'];
        $ship->min_quantity = $data['ShipConfig']['min_qtty'];
        $ship->normal_fees = $data['ShipConfig']['fee'];
        $ship->updated_by = Yii::$app->user->identity->id;
        $ship->flag = 0;
        if ($ship->save(false)) {
            return true;
        } else {
            return false;
        }

    }

    public function deleteShipConfig($id)
    {
        $ship = self::findOne(['id' => $id]);
        $ship->flag = 1;
        $ship->save(false);
    }


    public function rules()
    {
        return [
            ['countries', 'required', 'message' => 'Please select a country.'],
            ['min_purch', 'required', 'message' => 'Please enter minimum purchase.'],
            ['fee', 'required', 'message' => 'Please enter normal fee.'],
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