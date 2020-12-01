<?php

namespace frontend\models\events;
use yii\base\Event;
use frontend\models\User;
use common\components\UserNotificationInterface;
    

/**
 * Description of UserRgisteredEvent
 *
 * @author Дмитрий
 */
class UserRgisteredEvent extends Event implements UserNotificationInterface
{
    /*
     * @vat User
     */
    public $user;
    /*
     * @var string
     */
    public $subject;
    /*
     * @return string
     * 
     */
    public function getSubject(){
       return $this->subject; 
    }
    /*
     * @return string
     * 
     */
    public function getEmaik()
    {
       return $this->user->email;
    }
}
