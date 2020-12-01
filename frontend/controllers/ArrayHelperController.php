<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;
use frontend\models\Employee;
/**
 * Description of ArrayHelperController
 *
 * @author Дмитрий
 */
class ArrayHelperController extends \yii\web\Controller{
    public function actionDemo()
    {
        $employees = Employee::find();
        return $this->render('demo',[
            'employees'=>$employees,
        ]);
    }
    //put your code here
}
