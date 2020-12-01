<?php

namespace frontend\models\forms;
use yii\base\Model;
use frontend\models\User;
use Yii;



/**
 * Description of SignupForm
 *
 * @author Дмитрий
 */
class SignupForm extends Model{
    public $username;
    public $email;
    public $password;
    
    public function rules()
    {
        return [
            ["username",'trim'],
            ["username",'required','message'=>'Введите имя пользователя'],
            ["username",'string','min'=> 2,'max'=> 255],
            [['username'],'unique', 'targetClass'=>User::className()],
            
            ['email','trim'],
            ['email','required'],
            ['email','email'],
            ['email','string','max'=>255],
            [['email'],'unique', 'targetClass'=>User::className()],
            ['password','required'],
            ['password','string','min'=>6],
        ];
    }
    
    
    /**
     * 
     * @return User|null
     */
    public function save()
    {
        if($this->validate()){
            $user = new User();
            $user->email = $this->email;
            $user->username = $this->username;
            $user->created_at = $time=time();
            $user->updated_at = $time;
            $user->auth_key=Yii::$app->security->generateRandomString();
            $user->password_hash = Yii::$app->security
                    ->generatePasswordHash($this->password);
            
           // return $user->save();
            if ($user->save()){
//                $event = new UserRgisteredEvent();
//                $event->user = $user;
//                $event->subject = 'New User registered';
//                $user->trigger(User::USER_REGISTERED, $event);
                return $user;           
                }
            
        }
    }
}
