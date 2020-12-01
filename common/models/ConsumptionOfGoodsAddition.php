<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "consumption_of_goods_addition".
 *
 * @property int $ID_consumption
 * @property int $ID_product
 * @property int $quantity_of_goods
 * @property string $unit_price
 *
 * @property Product $product
 */
class ConsumptionOfGoodsAddition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consumption_of_goods_addition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_consumption', 'ID_product'], 'required'],
            [['ID_consumption', 'ID_product', 'quantity_of_goods'], 'integer'],
            [['unit_price'], 'string', 'max' => 45],
            [['ID_consumption', 'ID_product'], 'unique', 'targetAttribute' => ['ID_consumption', 'ID_product']],
            [['ID_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['ID_product' => 'id_product']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_consumption' => 'Id Consumption',
            'ID_product' => 'Id Product',
            'quantity_of_goods' => 'Quantity Of Goods',
            'unit_price' => 'Unit Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id_product' => 'ID_product']);
    }
}
