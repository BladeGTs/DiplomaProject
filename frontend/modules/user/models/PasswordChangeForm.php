<?php

namespace app\modules\user\models;
 
use yii\base\Model;
use Yii;
use frontend\models\User;
 
/**
 * Password reset form
 */
class PasswordChangeForm extends Model
{
    public $currentPassword;
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
            [['currentPassword', 'newPassword', 'newPasswordRepeat'], 'required'],
            ['currentPassword', 'currentPassword'],
            ['newPassword', 'string', 'min' => 6],
            ['newPasswordRepeat', 'compare', 'compareAttribute' => 'newPassword'],
        ];
    }
 
    public function attributeLabels()
    {
        return [
            'newPassword' => Yii::t('app', 'Новый пароль'),
            'newPasswordRepeat' => Yii::t('app', 'Повторение нового пароля'),
            'currentPassword' => Yii::t('app', 'Текущий пароль'),
        ];
    }
 
    /**
     * @param string $attribute
     * @param array $params
     */
    public function currentPassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (!$this->_user->validatePassword($this->$attribute)) {
                $this->addError($attribute, Yii::t('app', 'Неверный пароль'));
            }
        }
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