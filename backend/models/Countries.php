<?php
namespace backend\models;

use yii\db\Query;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;

class Countries extends ActiveRecord
{

    public static function tableName()
    {
        return 'soph_countries';
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

    public function listCountries($id=''){
        $countries = (new Query())->select('*')->from('soph_countries')->orderBy('name', 'ASC')->all();
        foreach($countries as $country){
            $selected = '';
            if($country['id']==$id){
                $selected = 'selected';
            }else if($country['sortname']=='MY'){
                $selected = 'selected';
            }
            echo '<option value="'.$country['id'].'" '.$selected.'>'.$country['name'].'</option>';
        }

    }
    public function updateImg($image_path, $id, $param){
        $img = self::findOne(['base_id'=> $id]);
        $img->img_path = $image_path;
        $img->param_img = Param::getParam($param);
        $img->flag = 0;
        $img->save();
        return $img;

    }

}