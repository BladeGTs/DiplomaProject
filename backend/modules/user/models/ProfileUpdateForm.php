<?php
namespace app\modules\user\models;
 
use yii\base\Model;
use yii\db\ActiveQuery;
use Yii;
use backend\models\User;
 
class ProfileUpdateForm extends Model
{
    public $email;
    public $userName;
    public $nickName;
    public $id;
    public $roles;
    
    /**
     * @var User
     */
    private $_user;
 
    public function __construct(User $user, $config = [])
    {
        $this->_user = $user;
        $this->email = $user->email;
        $this->id = $user->id;
        $this->userName = $user->username;
        $this->nickName = $user->nickname;
        $this->roles = $user->roles;
        parent::__construct($config);
    }
 
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            ['email','unique','targetClass' => User::className(),'message' => Yii::t('app', 'Такой email уже занят'),'filter' => ['<>', 'id', $this->_user->id],],
            ['userName','unique','targetClass' => User::className(),'message' => Yii::t('app', 'Такое имя пользователя уже занято'),'filter' => ['<>', 'id', $this->_user->id],],
            ['nickName','unique','targetClass' => User::className(),'message' => Yii::t('app', 'Такой НикНэйм уже занят'),'filter' => ['<>', 'id', $this->_user->id],],
            ['roles','safe'],
            ['email', 'string', 'max' => 255],
        ];
    }
 
    public function update()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->email = $this->email;
            $user->nickname = $this->nickName;
            $user->username = $this->userName;
            $user->roles = $this->roles;
            return $user->save();
        } else {
            return false;
        }
    }
        /**
     * @return array
     */
    public function getRolesDropdown()
    {
        return [
            User::ROLE_ADMIN => 'Admin',
            User::ROLE_MODERATOR => 'Moderator',
        ];
    }

}