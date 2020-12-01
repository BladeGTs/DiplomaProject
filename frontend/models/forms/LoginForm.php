<?php

namespace frontend\models\forms;
use yii\base\Model;
use frontend\models\User;
use Yii;



/**
 * Description of LoginForm
 *
 * @author Дмитрий
 */
class LoginForm extends Model{
    public $username;
    public $password;
    
    public function rules()
    {
        return [
            ["username",'trim'],
            ["username",'required','message'=>'Введите имя пользователя'],
            ['password','required','message'=>'Введите пароль'],
            ['password','validatePassword']
        ];
    }
    public function login()
    {
        if($this->validate())
        {
            $user = User::findByUserName($this->username);
            return Yii::$app->user->login($user);
        }
        return false;
    }
    
    public function validatePassword($attribute, $params)
    {
        $user = User::findByUserName($this->username);
        if(!$user || !$user->validatePassword($this->password))
        {
              $this->addError($attribute,'Incorrect password');  
        }
    }
  
}
