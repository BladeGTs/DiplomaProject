<?php

namespace frontend\widgets\newsList;

use Yii;
use yii\base\Widget;
use frontend\models\Test;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsList
 *
 * @author Дмитрий
 */
class NewsList extends Widget {
    public $showLimit = null;
    public function run() {
        $max = Yii::$app->params['maxNewInList'];
        if($this->showLimit)
        {
            $max = $this->showLimit;
        }
        $list = Test::getNewsList($max);
        return $this->render('block', [
                    'list' => $list,
        ]);
    }

}
