<?php
namespace backend\models;

use Yii;

use yii\db\Query;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;
use backend\models\SubCategories as SubCategories;

class Categories extends ActiveRecord
{
    public $cat_id;
    public $cat_name;
    public $subcat_name;
    const SCENARIO_UPDATE = 'update';

    public static function tableName()
    {
        return 'soph_categories';
    }


    public function listCategories()
    {
        $catAll = (new Query())->select('*')->from('soph_categories')->where('flag=0')->orderBy('created_at', 'DESC')->all();
        return $catAll;
    }

    public function findCategory($id)
    {
        $catOne = (new Query())->select('*')->from('soph_categories')->where('flag=0')->where('id=' . $id)->andWhere('flag=0')->one();
        return $catOne;
    }

    public function createCategory($data)
    {
        $cat = new Categories();
        $cat->name = $data['Categories']['cat_name'];
        $cat->created_by = Yii::$app->user->identity->id;
        $cat->flag = 0;
        if ($cat->save(false)) {
            $insert_id = $cat->id;
            $scat = new SubCategories();
            $scat->newSubCat($data['Categories']['subcat_name'], $insert_id);
            return true;
        } else {
            return false;
        }

    }

    public function updateCategory($data, $id)
    {
        $cat = self::findOne($id);
        $cat->name = $data['Categories']['cat_name'];
        $cat->updated_by = Yii::$app->user->identity->id;
        $cat->flag = 0;
        if ($cat->save(false)) {
            $scat = new SubCategories();
            $scat->updateSubCat($data['Categories']['subcat_name'], $id);
            return true;
        } else {
            return false;
        }

    }

    public function deleteCategory($id)
    {
        $cat = self::findOne(['id' => $id]);
        $cat->flag = '1';
        $cat->save(false);
    }


    public function rules()
    {
        return [
            ['cat_name', 'required', 'message' => 'Please fill in the Category.'],
            ['subcat_name', 'required', 'message' => 'Please fill in the Subcategory.'],
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