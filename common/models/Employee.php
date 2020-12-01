<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "employee".
 *
 * @property int $idworker
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $birthday
 * @property string $city
 * @property string $id_code
 * @property string $email
 * @property string $phone
 *
 * @property ConsumptionOfGoods[] $consumptionOfGoods
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birthday'], 'safe'],
            [['first_name', 'middle_name'], 'string', 'max' => 100],
            [['last_name', 'city', 'id_code', 'email', 'phone'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idworker' => 'Идентификатор',
            'first_name' => 'Имя',
            'middle_name' => 'Отчество',
            'last_name' => 'Фамилия',
            'birthday' => 'Дата рождения',
            'city' => 'Город',
            'id_code' => 'Id Code',
            'email' => 'Email',
            'phone' => 'Телефон',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsumptionOfGoods()
    {
        return $this->hasMany(ConsumptionOfGoods::className(), ['fullname_delivered' => 'idworker']);
    }
    
        public static function getList() {
        $list = self::find()->asArray()->all();
        return ArrayHelper::map($list, 'idworker', function ($list, $defaultValue) {
                    return $list['first_name'] . ' ' . $list['last_name'];
                }
        );
    }
}
