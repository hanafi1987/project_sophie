<?php
namespace frontend\models;

use Yii;
use yii\db\Query;
use yii\db\ActiveRecord;

class Banners extends ActiveRecord
{

    public static function tableName()
    {
        return 'soph_banners';
    }


    public function listBanners()
    {
        $bannerAll = (new Query())->select('a.name, a.url, b.img_path')->from('soph_banners a')->leftJoin('soph_img b', 'a.id = b.base_id')->where('b.param_img = 1')->andWhere('a.status=0')->andWhere('a.flag=0')->orderBy('a.updated_at', 'DESC')->all();
        return $bannerAll;
    }

}