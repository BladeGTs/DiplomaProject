<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\models;
use Yii;
/**
 * Description of NewsSearch
 *
 * @author Дмитрий
 */
class NewsSearch {
    
    public function simpleSearch($keyword)
    {
        $params = [
          ':keyword'=>$keyword,  
        ];
        $sql = "SELECT * FROM News WHERE MATCH (content) AGAINST (:keyword) LIMIT 20"; 
        return Yii::$app
                ->db
                ->createCommand($sql)
                ->bindValues($params)
                ->queryAll();
    }
}
