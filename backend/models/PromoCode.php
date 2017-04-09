<?php
namespace backend\models;

use Yii;

use yii\db\Query;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;

class PromoCode extends ActiveRecord
{
    public $code;
    public $min_type;
    public $disc_type;
    public $param_id;
    public $min_purch;
    public $min_qtty;
    public $disc_percent;
    public $disc_money;
    public $min;
    public $disc;


    const SCENARIO_UPDATE = 'update';

    public static function tableName()
    {
        return 'soph_promocode';
    }


    public function listPromoCode()
    {
        $promocodeAll = (new Query())->select('*')->from('soph_promocode')->where('flag=0')->orderBy('created_at', 'DESC')->all();
        return $promocodeAll;
    }

    public function findPromoCode($id)
    {
        $promocodeOne = (new Query())->select('*')->from('soph_promocode')->where('id=' . $id)->andWhere('flag=0')->one();
        return $promocodeOne;
    }

    public function createPromoCode($data)
    {
        if ($data['PromoCode']['min_type'] == '8') {
            $mtype = number_format($data['PromoCode']['min_purch'], 2, '.', '');
        } else if ($data['PromoCode']['min_type'] == '9') {
            $mtype = $data['PromoCode']['min_qtty'];
        }

        if ($data['PromoCode']['disc_type'] == '10') {
            $dtype = $data['PromoCode']['disc_percent'];
        } else if ($data['PromoCode']['disc_type'] == '11') {
            $dtype = number_format($data['PromoCode']['disc_money'], 2, '.', '');
        }
        $params = array('min_type' => $data['PromoCode']['min_type'], 'min' => $mtype, 'disc_type' => $data['PromoCode']['disc_type'], 'disc' => $dtype);
        $promocode = new PromoCode();
        $promocode->promo_code = $data['PromoCode']['code'];
        $promocode->params = json_encode($params);
        $promocode->created_by = Yii::$app->user->identity->id;
        $promocode->flag = 0;
        if ($promocode->save(false)) {
            return true;
        } else {
            return false;
        }

    }

    public function updatePromoCode($data, $id)
    {
        if ($data['PromoCode']['min_type'] == '8') {
            $mtype = number_format($data['PromoCode']['min_purch'], 2, '.', '');
        } else if ($data['PromoCode']['min_type'] == '9') {
            $mtype = $data['PromoCode']['min_qtty'];
        }

        if ($data['PromoCode']['disc_type'] == '10') {
            $dtype = $data['PromoCode']['disc_percent'];
        } else if ($data['PromoCode']['disc_type'] == '11') {
            $dtype = number_format($data['PromoCode']['disc_money'], 2, '.', '');
        }
        $params = array('min_type' => $data['PromoCode']['min_type'], 'min' => $mtype, 'disc_type' => $data['PromoCode']['disc_type'], 'disc' => $dtype);
        $promocode = self::findOne($id);
        $promocode->promo_code = $data['PromoCode']['code'];
        $promocode->params = json_encode($params);
        $promocode->updated_by = Yii::$app->user->identity->id;
        $promocode->flag = 0;
        if ($promocode->save(false)) {
            return true;
        } else {
            return false;
        }

    }

    public function deletePromoCode($id)
    {
        $promocode = self::findOne(['id' => $id]);
        $promocode->flag = 1;
        $promocode->save(false);
    }


    public function getNumberOfPromocode(){
        $count = self::find()->where('flag=0')->count();
        return $count;
    }

    public function rules()
    {
        return [
            ['code', 'required', 'message' => 'Please enter Promo Code.'],
            ['min_type', 'required', 'message' => 'Please select Minimum Type.'],
            ['disc_type', 'required', 'message' => 'Please select Discount Type.'],
            ['min_purch', 'required', 'message' => 'Please enter Minimum Purchase (RM).', 'when' => function ($model) {
                return $model->min_type == '8';
            }],
            ['min_qtty', 'required', 'message' => 'Please enter Minimum Quantity.', 'when' => function ($model) {
                return $model->min_type == '9';
            }],
            ['disc_percent', 'required', 'message' => 'Please enter Discount in Percentage(%).', 'when' => function ($model) {
                return $model->disc_type == '10';
            }],
            ['disc_money', 'required', 'message' => 'Please enter Discount in RM.', 'when' => function ($model) {
                return $model->disc_type == '11';
            }],

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