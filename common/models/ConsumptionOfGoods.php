<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "consumption_of_goods".
 *
 * @property int $ID_consumption
 * @property int $recipient_name
 * @property string $agreement_number
 * @property string $power_of_Attorney_Date
 * @property int $fullname_received
 * @property int $fullname_delivered
 * @property string $date_of_consumption_of_goods_from_stock
 *
 * @property Employee $fullnameDelivered
 */
class ConsumptionOfGoods extends \yii\db\ActiveRecord {
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'consumption_of_goods';
    }

    public function behaviors() {
        return [
            [
                'class' => \common\components\behaviors\ManyHasManyBehavior::className(),
                'relations' => [
                    'products' => 'products_list',
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['recipient_name', 'fullname_received', 'fullname_delivered'], 'integer'],
            [['power_of_Attorney_Date', 'date_of_consumption_of_goods_from_stock','products_list'], 'safe'],
            [['agreement_number'], 'string', 'max' => 45],
            [['fullname_delivered'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['fullname_delivered' => 'idworker']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'ID_consumption' => 'Id',
            'recipient_name' => 'Наименование получателя',
            'agreement_number' => 'Номер доверенности',
            'power_of_Attorney_Date' => 'Дата выписки доверенности',
            'fullname_received' => 'ФИО принявшего товар',
            'fullname_delivered' => 'ФИО сдавшего товар',
            'date_of_consumption_of_goods_from_stock' => 'Дата расхода товара',
        ];
    }

    public function getRecipientsName() {
        return $this->hasOne(Recipients::class, ['idRecipients' => 'recipient_name']);
    }

       public function getProducts()
   {
       return $this->hasMany(Product::class, ['id_product'=>'ID_product'])->viaTable('consumption_of_goods_addition', ['ID_consumption'=>'ID_consumption']);
   }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNameReceived() {
        return $this->hasOne(Employee::className(), ['idworker' => 'fullname_received']);
    }

    public function getNameDelivered() {
        return $this->hasOne(Employee::className(), ['idworker' => 'fullname_delivered']);
    }

    public function getFullNameReceived() {
        $name = $this->nameReceived;
        return $name ? $name->first_name . ' ' . $name->middle_name . ' ' . $name->last_name : 'Не установлено';
    }

    public function getFullNameDelivered() {
        $name = $this->nameDelivered;
        return $name ? $name->first_name . ' ' . $name->middle_name . ' ' . $name->last_name : 'Не установлено';
    }

}
