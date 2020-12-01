<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\controllers;

/**
 * Description of HtmlHelperController
 *
 * @author Дмитрий
 */
class HtmlHelperController extends \yii\web\Controller{

    public function actionDemo()
    {
        return $this->render('demo');
    }
    
    public function actionEscapeOutput() //безопасный вывод
    {
        $comments =[
            [
                'id'=>10,
                'author'=>'student',
                'text'=>'Hellp',
            ],
            [
                'id'=>11,
                'author'=>'Victor',
                'text'=>'Help me',
            ],
                        [
                'id'=>11,
                'author'=>'Victor',
                'text'=>'<b>Hellp!</b><script> alert("Iwill"); </script>',
            ],
        ];
        return $this->render('escape-output',['comments'=>$comments,
            ]);
        
    }
}
