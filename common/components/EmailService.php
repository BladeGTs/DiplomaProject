<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common\components;
use yii\base\Component;
use Yii;
use common\components\UserNotificationInterface;

/**
 * Description of emailService
 *
 * @author Дмитрий
 */
class EmailService extends Component{

/**
 * 
 * @param UserNotificationInterface $event
 * @return bool
 */
    public function notifyUser(UserNotificationInterface $event)
    {
        return Yii::$app->mailer->compose()
                ->setFrom('service.email@yii2frontend.com')
                ->setTo($event->getEmail())
                ->setSubject($event)
                ->send();
    }
 /**
  * 
  * @param UserNotificationInterface $event
  * @return bool
  */
     public function notifyAdmins(UserNotificationInterface $event)
    {
        return Yii::$app->mailer->compose()
                ->setFrom('service.email@yii2frontend.com')
                ->setTo('dm77713@ya.ru')
                ->setSubject($event->getSubject())
                ->send();
    }
}
