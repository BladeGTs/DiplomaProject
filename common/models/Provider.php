<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "provider".
 *
 * @property int $idprovider
 * @property string $supplier_name
 * @property string $code_inn
 * @property string $legal_address
 * @property string $phone
 * @property string $contact_person
 * @property string $position
 *
 * @property ArrivalOfGoods[] $arrivalOfGoods
 */
class Provider extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'provider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['supplier_name', 'code_inn', 'legal_address', 'phone', 'contact_person', 'position'], 'string', 'max' => 45],
        ];
    }

    public function beforeValidate() {
        $this->supplier_name = strip_tags($this->supplier_name);
        $this->legal_address = strip_tags($this->legal_address);
        $this->contact_person = strip_tags($this->contact_person);
        $this->position = strip_tags($this->position);
        return parent::beforeValidate();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'idprovider' => 'Идентификатор',
            'supplier_name' => 'Наименование поставщика',
            'code_inn' => 'ИНН',
            'legal_address' => 'Адрес',
            'phone' => 'Номер телефона',
            'contact_person' => 'Контактное лицо',
            'position' => 'Должность',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArrivalOfGoods() {
        return $this->hasMany(ArrivalOfGoods::className(), ['supplier_name' => 'idprovider']);
    }

    public static function getList() {
        $list = self::find()->asArray()->all();
        return ArrayHelper::map($list, 'idprovider', 'supplier_name');
    }

}
