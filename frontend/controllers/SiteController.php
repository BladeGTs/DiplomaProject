<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\User;
use frontend\controllers\behaviors\MyBehavior;

/**
 * Site controller
 */
class SiteController extends Controller {

    public $params;

    public function behaviors(): array {
        return [
            MyBehavior::className()
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
//            'error' => [
////                'class' => 'yii\web\ErrorAction',
////                'view' => '@app/views/site/custom-error-view.php'
//            ],
        ];
    }

    public function actionFault()
{
    $exception = Yii::$app->errorHandler->exception;
 
    if ($exception !== null) {
        $statusCode = $exception->statusCode;
        $name = $exception->getName();
        $message = $exception->getMessage();
        
        $this->layout = 'custom-error-layout';
        
        return $this->render('custom-error-view', [
            'exception' => $exception,
            'statusCode' => $statusCode,
            'name' => $name,
            'message' => $message
        ]);
    }
}
    
    public function beforeAction($action) {
        if ($action->id == 'error') {
            $this->layout = 'custom-error-layout';
        }
        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     * @return mixed
     */
    public function actionIndex() {
        $users = User::find()->all();
        return $this->render('index', [
                    'users' => $users,
        ]);
    }

}
