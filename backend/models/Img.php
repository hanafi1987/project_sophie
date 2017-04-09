<?php
namespace backend\models;

use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;

class Img extends ActiveRecord
{
    public $folder_path;

    public static function tableName()
    {
        return 'soph_img';
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

    public function newImg($image, $id, $param)
    {
        if ($id != null) {
            $image->base_id = $id;
        }
        $image->param_img = Param::getParam($param);
        $image->flag = 0;
        $image->save();
        return $image;

    }

    public function updateImg($image, $id)
    {
        $img = self::updateAll(['name' => $image->name, 'type' => $image->type, 'size' => $image->size, 'img_path' => $image->img_path], 'base_id=' . $id);
        return $img;

    }

    public function updateImgById($base_id, $id)
    {
        $img = self::findOne(['id' => $id]);
        $img->base_id = $base_id;
        $img->flag = 0;
        $img->save();
        return $img;

    }

    public function imgById($id)
    {
        $img = self::findOne($id);
        return $img;
    }

    public function imgByBaseId($base_id)
    {
        $img = self::findOne(['base_id'=>$base_id]);
        return $img;
    }

    public function deleteImg($id){
        $img = self::findOne($id);
        $img->flag = 1;
        $img->save();
        return $img;
    }


}