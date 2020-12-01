<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\forms\SearchForm;
use Yii;

/**
 * Description of SearchController
 *
 * @author Дмитрий
 */
class SearchController extends Controller{

    public function actionIndex()
    {
        $model = new SearchForm();
        $result = null;
        if($model->load(Yii::$app->request->post()))
        {
            $result = $model->search();
        }
        return $this->render('index',[
            'model'=>$model,
            'result'=>$result,
        ]);
    }
}