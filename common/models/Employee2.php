<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

class Employee extends \yii\db\ActiveRecord {

    const SCENARIO_EMPLOYEE_REGISTER = 'employee_register';
    const SCENARIO_EMPLOYEE_UPDATE = 'employee_update';

    public $firstName;
    public $lastName;
    public $middleName;
    public $slary;
    public $email;
    public $birthday;
    public $city;
    public $idCode;
    public $position;

    public function scenarios() {
        return [
            self::SCENARIO_EMPLOYEE_REGISTER => ['firstName', 'lastName', 'middleName', 'birthday', 'city', 'position', 'idCode', 'email'],
            self::SCENARIO_EMPLOYEE_UPDATE => ['firstName', 'lastName', 'middleName'],
        ];
    }

    public function rules() {
        return [
            [['firstName', 'lastName', 'email'], 'required'],
            [['firstName'], 'string', 'min' => 2],
            [['lastName'], 'string', 'min' => 3],
            [['email'], 'email'],
            [['middleName'], 'required', 'on' => self::SCENARIO_EMPLOYEE_UPDATE], //Для определенного сценария
            [['birthday'], 'date', 'format' => 'php:Y-m-d'],
            [['city'], 'integer'],
            [['idCode'], 'string', 'length' => 10],
            [['position', 'idCode'], 'required', 'on' => self::SCENARIO_EMPLOYEE_REGISTER],
        ];
    }

//   public function save(){
//       return true;
//   }
//   public static function find()
//   {
//       $sql = "SELECT * FROM employee";
//     return Yii::$app->db->createCommand($sql)->queryAll();
//   }
    public static function getList() {
        $list = self::find()->asArray()->all();
        return ArrayHelper::map($list, 'idworker', function ($list, $defaultValue) {
                    return $list['first_name'] . ' ' . $list['last_name'];
                }
        );
    }

    public static function getCitiesList() {
        $sql = "SELECT * FROM `city`";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return ArrayHelper::map($result, 'id', 'name');
    }

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

}
