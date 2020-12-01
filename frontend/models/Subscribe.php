<?php



namespace frontend\models;
use yii\base\Model;
use Yii;

class Subscribe extends Model
{
    public $email;
    
    public function rules(){
        return [
          [['email'],'required'],
            [['email'],'email'],
        ];
    }
    public function save(){
    $sql = "INSERT INTO SUBSCRIBE(id,email) VALUES(NULL,'{$this->email}')";
        return Yii::$app->db->createCommand($sql)->execute();
                
    }
}
