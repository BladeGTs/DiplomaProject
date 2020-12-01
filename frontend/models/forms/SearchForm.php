<?php

namespace frontend\models\forms;
use yii\base\Model;
use frontend\models\NewsSearch;
/*
 * Description of LoginForm
 *
 * @author Дмитрий
 */
class SearchForm extends Model{
    public $keyword;
    
    public function rules()
    {
        return [
            ["keyword",'trim'],
            ["keyword",'required'],
            ["keyword",'string','min'=>3],
            
        ];
    }
    public function search()
    {
     if($this->validate()){
     $model = new NewsSearch();
        return $model->simpleSearch($this->keyword);
     }
    }
  
}
