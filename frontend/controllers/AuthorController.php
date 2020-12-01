<?php

namespace frontend\controllers;

use frontend\models\Author;
use Yii;
use frontend\controllers\behaviors\AccessBehavior;

class AuthorController extends \yii\web\Controller {

    public function behaviors(): array {
        return [
            AccessBehavior::className()
        ];
    }

    public function actionCreate() {

        $model = new Author();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Автор добавлен');
            return $this->redirect(['author/']);
        }

        return $this->render('create', ["model" => $model]);
    }

    public function actionDelete($id) {
        $this->checlAccess();        $model = Author::findOne($id);
        $model->delete();
        Yii::$app->session->setFlash('success', 'Автор был удален');

        return $this->redirect(['author/index']);
    }

    public function actionIndex() {
        $authorList = Author::find()->all();

        return $this->render('index',
                        ['authorList' => $authorList
        ]);

    }

    public function actionUpdate($id) {

        $model = Author::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Автор был отредактирован');
            return $this->redirect(['author/']);
        }
        return $this->render('update', [
                    "model" => $model,
        ]);
    }

}
