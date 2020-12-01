<?php

namespace frontend\controllers\behaviors;

use Yii;
use yii\base\Behavior;
use yii\web\Controller;
/**
 * Description of AccessBehavior
 *
 * @author Дмитрий
 */
class AccessBehavior extends Behavior {
    public function events()
    {
        return[
          Controller::EVENT_BEFORE_ACTION => 'checlAccess'  
        ];
    }
    public function checlAccess() {
        if (Yii::$app->user->isGuest) {
            return Yii::$app->controller->redirect(['site/index']);
        }
    }

}
