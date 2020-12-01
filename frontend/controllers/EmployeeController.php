<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Employee;

class EmployeeController extends Controller{
    
    public function actionRegister()
    {
        $model = new Employee();
        $model->scenario = Employee::SCENARIO_EMPLOYEE_REGISTER;
        
        //$formData = Yii::$app->request->post();
        
        if($model->load(Yii::$app->request->post())){
            
           // $model->attributes = $formData['Employee'];
            
            if($model->validate() && $model->save())
            {
                Yii::$app->session->setFlash('success','Registered');
            }
        }
        
        return $this->render('register', [
            'model' => $model,
                ]);
    }
    
    public function actionUpdate(){
        $model = new Employee();
        $model->scenario = Employee::SCENARIO_EMPLOYEE_UPDATE;
        
        $formData = Yii::$app->request->post();
        
        if(Yii::$app->request->isPost){

            $model->attributes = $formData['Employee'];
            
            if($model->validate() && $model->save())
            {
                Yii::$app->session->setFlash('success','Data updated');
            }
        }
        
        return $this->render('update', [
            'model' => $model,
                ]);
        return $this->render('update');
    }
}
