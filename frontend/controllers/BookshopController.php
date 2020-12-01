<?php

namespace frontend\controllers;
use frontend\models\Book;
use Yii;
use frontend\models\Publisher;
class BookshopController extends \yii\web\Controller
{
    public function actionIndex()
    {  
      //  $conditions = ['publisher_id'=>1];
      //  $bookList = Book::find()->where($conditions)->orderBy('date_published')->limit(4)->all();
        $bookList = Book::find()->orderBy('date_published')->all();
        return $this->render('index',[
            'bookList' => $bookList,
        ]);
    }
    public function actionCreate()
    {
        $book = new Book();
        $publishers = Publisher::getList();
        if($book->load(Yii::$app->request->post()) && $book->save()) 
        {
            Yii::$app->session->setFlash('success', 'Saved!');
           // return $this->redirect(['bookshop/index']); //перенаправление на страницу
            return $this->refresh();// обновление страницы
        }

        return $this->render('create',[
           'book'=>$book,
            'publishers'=>$publishers,
       ]); 
    }

}
