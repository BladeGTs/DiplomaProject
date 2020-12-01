<?php

namespace backend\modules\consumptionOfGoodsAddition\controllers;

use yii\web\Controller;

/**
 * Default controller for the `consumptionOfGoodsAddition` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
