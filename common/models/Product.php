<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "product".
 *
 * @property int $id_product
 * @property int $barcode
 * @property string $Name
 * @property string $Product group
 * @property string $Units
 * @property string $Manufacturer Name
 * @property string $Country of Origin
 *
 * @property ConsumptionOfGoodsInAddition[] $consumptionOfGoodsInAdditions
 * @property ArrivalOfGoodsInAddition[] $arrivalOfGoodsInAdditions
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Product_group', 'Units', 'Manufacturer_Name', 'Country_of_Origin'], 'string', 'max' => 45],
            [['barcode'],'number'],
            [['barcode'], 'unique'],
            [['Name','barcode'],'required'],
            [['arrivalOfGoods_list'], 'safe'],
        ];
    }
    
    public function beforeValidate() {
        $this->Name = strip_tags($this->Name);
        $this->Product_group = strip_tags($this->Product_group);
        $this->Units = strip_tags($this->Units);
        $this->Manufacturer_Name = strip_tags($this->Manufacturer_Name);
        $this->Country_of_Origin = strip_tags($this->Country_of_Origin);
        return parent::beforeValidate();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product' => 'Идентификатор',
            'barcode' => 'Штрих-код',
            'Name' => 'Название',
            'Product_group' => 'Группа продукта',
            'Units' => 'Единицы измерения',
            'Manufacturer_Name' => 'Название фабрики производства',
            'Country_of_Origin' => 'Страна',
        ];
    }
    
   
    /*
     * @return array
     */
   /* public function Inventarization()
    {
        $sql = "SELECT product.barcode, product.Name, Sum(arrival_of_goods_addition.quantity_of_goods - consumption_of_goods_addition.quantity_of_goods) as summ,product.Units, (Sum(arrival_of_goods_addition.quantity_of_goods*arrival_of_goods_addition.unit_price)-Sum(consumption_of_goods_addition.quantity_of_goods*consumption_of_goods_addition.unit_price)) AS Стоимость
            FROM (product INNER JOIN arrival_of_goods_addition ON product.id_product = arrival_of_goods_addition.Idproduct) INNER JOIN consumption_of_goods_addition ON product.id_product = consumption_of_goods_addition.ID_product
            GROUP BY product.barcode, product.Name, product.Units;";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
    */
    public function ArrivedProduct()
    {
        return self::find()
                ->Select('product.Name')
                ->addSelect('arrival_of_goods_addition.unit_price')
                ->with('arrivalOfGoodsInAdditions');
    }
    public static function getList()
    {
        $list = self::find()->asArray()->all(); // получение в виде массива (для экономии памяти)
        return ArrayHelper::map($list,'id_product','Name');
    }
    
    /*
     * return Arraylist of teatcher
     */    
    //Select id_teacher, concat(first_name,' ',last,name) From teacher
  /*  public function getTeacherList()
    {
        $list = self::find()->asArray()->all();
        return ArrayHelper::map($list,'id_teacher', function ($list, $defaultValue) {
        return $list['first_name'] . ' ' . $list['last_name'];}
            );
    }
   */
   
    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getConsumptionOfGoodsInAdditions()
//    {
//        return $this->hasMany(ConsumptionOfGoodsInAddition::className(), ['IDproduct' => 'id_product']);
//    }
//  
//    /**
//     * @return \yii\db\ActiveQuery
//     */
//    public function getArrivalOfGoodsAdditions()
//    {
//        return $this->hasMany(ArrivalOfGoodsAddition::className(), ['Idproduct' => 'id_product']);
//    }
//    
//     public function getArrivalOfGoods()
//     {
//         return $this->hasMany(ArrivalOfGoods::ClassName(),['id_product'=>'number_TTN'])->via('arrivalOfGoodsAdditions');
//     }
}
