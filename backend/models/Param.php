<?php
namespace backend\models;

use yii\db\Query;
use yii\db\ActiveRecord;

class Param extends ActiveRecord
{
    public static function tableName()
    {
        return 'soph_param';
    }

    public function getParamByID($id){
        $param = self::findOne($id);
        return $param->name;
    }

    public static function getParam($code){
      $param = self::findOne(['code'=>$code]);
      return $param->id;

    }

    public function listParam($code, $id){
        $params = (new Query())->select('*')->from('soph_param')->where('flag=0')->andWhere('code="'.$code.'"')->orderBy('name', 'ASC')->all();
        foreach($params as $param){
            $selected = '';
            if($param['id']==$id){
                $selected = 'selected';
            }
            echo '<option value="'.$param['id'].'" '.$selected.'>'.$param['name'].'</option>';
        }

    }

}