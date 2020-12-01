<?php

namespace app\modules\user\models;
 
use yii\base\Model;
use Yii;
use backend\models\User;
 
/**
 * Password reset form
 */
class PasswordChangeForm extends Model
{
    public $newPassword;
    public $newPasswordRepeat;
 
    /**
     * @var User
     */
    private $_user;
 
    /**
     * @param User $user
     * @param array $config
     */
    public function __construct(User $user, $config = [])
    {
        $this->_user = $user;
        parent::__construct($config);
    }
 
    public function rules()
    {
        return [
            [['newPassword', 'newPasswordRepeat'], 'required'],
            ['newPassword', 'string', 'min' => 6],
            ['newPasswordRepeat', 'compare', 'compareAttribute' => 'newPassword'],
        ];
    }
 
    public function attributeLabels()
    {
        return [
            'newPassword' => Yii::t('app', 'Новый пароль'),
            'newPasswordRepeat' => Yii::t('app', 'Повторение нового пароля'),
        ];
    }
  
    /**
     * @return boolean
     */
    public function changePassword()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->setPassword($this->newPassword);
            return $user->save();
        } else {
            return false;
        }
    }
}