<?php
namespace backend\models;

use yii\db\Query;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;
use yii\helpers\ArrayHelper;

class SubCategories extends ActiveRecord
{
    public static function tableName()
    {
        return 'soph_subcategories';
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

    public function getSubCategories($id)
    {
        $result = (new Query())->select('name')->from('soph_subcategories')->where('flag=0')->andWhere('categories_id=' . $id)->andWhere('flag=0')->orderBy('created_at', 'DESC')->all();
        $scatAll = ArrayHelper::toArray($result);
        $scatImp = ArrayHelper::getColumn($scatAll, 'name');
        return implode(", ", $scatImp);
    }
    public function getSubCategoriesSelect($id, $subid)
    {
        $result = (new Query())->select('id, name')->from('soph_subcategories')->where('flag=0')->andWhere('categories_id=' . $id)->andWhere('flag=0')->orderBy('created_at', 'DESC')->all();
        foreach($result as $subcat){
            $selected = '';
            echo $subcat['id'];
            if($subcat['id']==$subid){
                $selected = 'selected="selected"';
            }
            echo '<option value="'.$subcat['id'].'" '.$selected.'>'.$subcat['name'].'</option>';
        }
    }

    public function newSubCat($subcat, $id)
    {
        $subcatArray = explode(',', $subcat);
        foreach ($subcatArray as $item) {
            $scat = new SubCategories();
            $scat->name = $item;
            $scat->categories_id = $id;
            $scat->flag = 0;
            $scat->save();
        }
    }

    public function updateSubCat($subcat, $id)
    {
        self::updateAll(['flag' => 1], ['categories_id' => $id]);
        $subcatArray = explode(',', $subcat);
        foreach($subcatArray as $item){
            $scat = new SubCategories();
            $scat->name = $item;
            $scat->categories_id = $id;
            $scat->flag = 0;
            $scat->save();
        }

    }

    public function getSubAndCat($subid){
        $result = (new Query())->select('a.name as catname, b.name as subcatname')->from('soph_categories a')
            ->leftJoin("soph_subcategories b", "b.categories_id=a.id")
            ->where('b.flag=0')
            ->andWhere('b.id=' . $subid)->one();
        return $result;
    }

}