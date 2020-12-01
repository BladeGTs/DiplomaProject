<?php

namespace common\models;
use common\models\Employee;
use Yii;
use common\models\Provider;
use \yii\helpers\ArrayHelper;

/**
 * This is the model class for table "arrival_of_goods".
 *
 * @property int $id
 * @property int $supplier_name
 * @property string $power_attorney_number
 * @property string $power_Attorney_Date
 * @property int $fullname_delivered
 * @property int $fullname_received
 * @property string $date_of_arrival_of_goods_to_the_warehouse
 *
 * @property Provider $supplierName
 * @property Employee $fullnameReceived
 * @property ArrivalOfGoodsAddition[] $arrivalOfGoodsAdditions
 */
class ArrivalOfGoods extends \yii\db\ActiveRecord {
    
    public $newProduct;
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'arrival_of_goods';
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

    public function beforeValidate() {
       // $this->supplierName = strip_tags($this->supplierName);
        $this->power_attorney_number = strip_tags($this->power_attorney_number);
        $this->fullname_delivered = strip_tags($this->fullname_delivered);
        $this->fullname_received = strip_tags($this->fullname_received);
        
        return parent::beforeValidate();
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['supplier_name', 'fullname_delivered', 'fullname_received'], 'integer'],
            [['power_Attorney_Date', 'date_of_arrival_of_goods_to_the_warehouse'], 'safe'],
            [['products_list'],'safe'],
            [['newProduct'],'integer','max'=>25],
            [['power_attorney_number'], 'string', 'max' => 45],
            [['supplier_name'], 'exist', 'skipOnError' => true, 'targetClass' => Provider::className(), 'targetAttribute' => ['supplier_name' => 'idprovider']],
            [['fullname_received'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['fullname_received' => 'idworker']],
            [['fullname_delivered'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['fullname_delivered' => 'idworker']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            
            'id' => 'ID',
            'supplier_name' => 'Наименование поставщика',
            'power_attorney_number' => 'Номер доверенности',
            'power_Attorney_Date' => 'Дата доверенности',
            'fullname_delivered' => 'ФИО принимавшего товар',
            'fullname_received' => 'ФИО получателя',
            'date_of_arrival_of_goods_to_the_warehouse' => 'Дата прихода продуктов на склад',
        ];
    }
   
   public function getProducts()
   {
       return $this->hasMany(Product::class, ['id_product'=>'Idproduct'])->viaTable('arrival_of_goods_addition', ['Idarrival'=>'id']);
   }
           
   

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplierName() {
        return $this->hasOne(Provider::className(), ['idprovider' => 'supplier_name']);
    }


    public function getParentName() {
        $supplier = $this->supplierName;
        return $supplier ? $supplier->supplier_name : "Не установлено";
    }

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
