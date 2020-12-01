<?php

namespace frontend\modules\user\models;

use yii\base\Model;
use frontend\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $nickName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
                ['username', 'trim'],
                ['username', 'required'],
                [['username'], 'unique', 'targetClass' => User::class, 'message' => 'Пользователь с таким именем уже существует.'],
                ['username', 'string', 'min' => 2, 'max' => 20],
                ['nickName', 'trim'],
                ['nickName', 'required'],
                [['nickName'], 'unique', 'targetClass' => User::class, 'message' => 'Пользователь с таким ником уже существует.'],
                ['nickName', 'string', 'min' => 2, 'max' => 20],
                ['email', 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                [['email'], 'unique', 'targetClass' => User::class,'message' => 'Пользователь с таким почтовым адресом уже зарегистрирован.'],
                ['password', 'required'],
                ['password', 'string', 'min' => 6],
        ];
    }
    public function attributeLabels(): array {
        return [
            'username'=>'Имя пользователя',
            'nickName'=>'Никнейм пользователя',
            'password'=>'Пароль',
            'email'=>'Email адрес',
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->nickname = $this->nickName;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }


}
