<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "Recipients".
 *
 * @property int $idRecipients
 * @property string $recipient_name
 * @property string $inn
 * @property string $legal_address
 * @property string $phone_number
 * @property string $contac_person
 *
 * @property ConsumptionOfGoods[] $consumptionOfGoods
 */
class Recipients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Recipients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recipient_name', 'inn', 'legal_address', 'phone_number', 'contac_person'], 'string', 'max' => 45],
        ];
    }
    
    public function beforeValidate() {
        $this->recipient_name = strip_tags($this->recipient_name);
        $this->inn = strip_tags($this->inn);
        $this->legal_address = strip_tags($this->legal_address);
        $this->phone_number = strip_tags($this->phone_number);
        $this->contac_person = strip_tags($this->contac_person);
        return parent::beforeValidate();
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idRecipients' => 'Идентификатор',
            'recipient_name' => 'Наименование получателя',
            'inn' => 'ИНН',
            'legal_address' => 'Адрес',
            'phone_number' => 'Номер телефона',
            'contac_person' => 'Контактное лицо',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsumptionOfGoods()
    {
        return $this->hasMany(ConsumptionOfGoods::className(), ['recipient name' => 'idRecipients']);
    }
    
 public static function getList() {
        $list = self::find()->asArray()->all();
        return ArrayHelper::map($list,'idRecipients', 'recipient_name');
    }
}
