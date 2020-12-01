<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\modules\user\models;
use yii\base\Model;
use yii\db\ActiveQuery;
use Yii;
use frontend\models\User;
/**
 * Description of ProfileUpdateForm
 *
 * @author Дмитрий
 */
class ProfileUpdateForm extends Model {
    public $email;
    public $nickname;
    private $_user;
    
    public function __construct(User $user, $config = array()) {
        $this->_user = $user;
        $this->email = $user->email;
        $this->nickname = $user->nickname;
        parent::__construct($config);
    }
    
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            [
                'email',
                'unique',
                'targetClass' => User::class,
                'message' => Yii::t('app', 'Такой email уже занят'),
                'filter' => ['<>', 'id', $this->_user->id],
            ],
            ['nickname',
                'unique',
                'targetClass'=>User::class,
                'message' => Yii::t('app', 'Такое имя пользователя уже занято'),
                'filter' => ['<>', 'username', $this->_user->username],
                ],
            ['email', 'string', 'max' => 255],
        ];
    }
     public function update()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->email = $this->email;
            $user->nickname = $this->nickname;
            return $user->save();
        } else {
            return false;
        }
    }
}
