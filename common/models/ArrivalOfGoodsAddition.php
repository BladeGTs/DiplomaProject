<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "arrival_of_goods_addition".
 *
 * @property int $idarrival_of_goods_addition
 * @property int $Idarrival идентификатор прихода
 * @property int $Idproduct идентификатор продукта
 * @property int $quantity_of_goods
 * @property string $unit_price
 *
 * @property ArrivalOfGoods $numberTTN
 * @property Product $product
 */
class ArrivalOfGoodsAddition extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'arrival_of_goods_addition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['Idarrival', 'Idproduct'], 'required'],
            [['Idarrival', 'Idproduct', 'quantity_of_goods'], 'integer'],
            [['unit_price'], 'string', 'max' => 45],
           [['Idarrival'], 'exist', 'skipOnError' => true, 'targetClass' => ArrivalOfGoods::className(), 'targetAttribute' => ['Idarrival' => 'id']],
            [['Idproduct'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['Idproduct' => 'id_product']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'idarrival_of_goods_addition' => 'Id',
            'Idarrival' => 'Номер ТТН',
            'Idproduct' => 'Продукт',
            'quantity_of_goods' => 'Колличество товара',
            'unit_price' => 'Цена за единицу товара',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNumberTTN() {
        return $this->hasOne(ArrivalOfGoods::className(), ['id' => 'Idarrival']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct() {
        return $this->hasOne(Product::className(), ['id_product' => 'Idproduct']);
    }

}
