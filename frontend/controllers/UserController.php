<?php

namespace frontend\controllers;
use frontend\models\forms\SignupForm;
use Yii;
use frontend\models\forms\LoginForm;

class UserController extends \yii\web\Controller
{
//    public function actionLogin()
//    {
//        $model = new LoginForm();
//        if($model->load(Yii::$app->request->post())&& $model->login())
//        {
//            return $this->redirect(['site/index']);
//        }
//        return $this->render('login',[
//            'model'=>$model,
//        ]);
//    }
    
    public function actionLogin()
    {
        $model = new LoginForm();
        if($model->load(Yii::$app->request->post())&& $model->validate())
        {
            $user = $model->getUser();
            if (!$user->hasTwoFaEnabled()) {
                $model->login();
                return $this->goBack();
            }
            Yii::$app->user->createLoginVerificationSession($user); //Allow the user to verify the login
            return $this->redirect(['login-verification']);

        }
        $model->password = '';
        return $this->render('login',[
            'model'=>$model,
        ]);
    }
    

    public function actionSignup()
    {
       $model = new SignupForm();
       if($model->load(Yii::$app->request->post()) && $user = $model->save())
       {
           Yii::$app->user->login($user);
           Yii::$app->session->setFlash('success','Пользователь добавлен');
           return $this->redirect(['site/index']);
       }
        return $this->render('signup',[
            'model'=>$model,
                ]);
    }
    
    public function actionLoginVerification() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $user = Yii::$app->user->getIdentityFromLoginVerificationSession();
        if ($user === null) {
            Yii::$app->session->destroy();
            return $this->goHome();
        }

        $model = new TwoFaForm();
        $model->setScenario(TwoFaForm::SCENARIO_LOGIN);
        $model->setUser($user);

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login-verification', [
            'model' => $model,
        ]);
    }
    
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['site/index']);
    }

}
