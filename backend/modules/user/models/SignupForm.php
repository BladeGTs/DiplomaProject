<?php

namespace app\modules\user\models;

use yii\base\Model;
use backend\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $roles;
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
                ['email', 'trim'],
                ['email', 'required'],
                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                [['email'], 'unique', 'targetClass' => User::class,'message' => 'Пользователь с таким почтовым адресом уже зарегистрирован.'],
                ['password', 'required'],
                ['password', 'string', 'min' => 6],
                ['roles','safe'],
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
        $user->roles = $this->roles;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
        

    }

    public function getRolesDropdown()
    {
        return [
            User::ROLE_ADMIN => 'Admin',
            User::ROLE_MODERATOR => 'Moderator',
        ];
    }
}
