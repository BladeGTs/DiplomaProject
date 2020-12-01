<?php

namespace backend\modules\user\controllers;

use Yii;
use backend\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\user\models\ProfileUpdateForm;
use app\modules\user\models\SignupForm;
use app\modules\user\models\PasswordChangeForm;
use yii\filters\AccessControl;

/**
 * ManageController implements the CRUD actions for User model.
 */
class ManageController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view'],
                        'roles' => ['admin', 'moderator'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete', 'update', 'create', 'password-change'],
                        'roles' => ['admin'],
                    ]],
                'denyCallback' => function ($rule, $action) {
                    Yii::$app->session->setFlash('error', 'Доступ запрещен!');
                    return $this->redirect(['index']);
                }
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new \backend\models\UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        $dataProvider = new ActiveDataProvider([
//            'query' => User::find(),
//        ]);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPasswordChange($id) {
        $user = $this->findModel($id);
        $model = new PasswordChangeForm($user);

        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            Yii::$app->session->setFlash('success', "Пароль пользователя изменен");
            return $this->redirect(['index']);
        } else {

            return $this->render('passwordChange', [
                        'model' => $model,
                        'user' => $user,
            ]);
        }
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {

        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new User();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }
    public function actionCreate() {

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', "Пользователь добавлен");
            return $this->redirect('index');
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionUpdate($id)
//    {   $model = $this->findModel($id);
//        
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }
    public function actionUpdate($id) {
        $user = $this->findModel($id);
        $model = new ProfileUpdateForm($user);

        if ($model->load(Yii::$app->request->post()) && $model->update()) {
            Yii::$app->session->setFlash('success', "Данные пользователя изменены");
            return $this->redirect(['view', 'id' => $user->id]);
        } else {

            return $this->render('update2', [
                        'model' => $model,
            ]);
        }
    }

    public function actionDelete($id) {
//        $this->findModel($id)->delete();
//        return $this->redirect('index');
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success','Удалено');
        if (!Yii::$app->request->isAjax) {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

//        private function findModel()
//    {
//        return User::findOne(Yii::$app->user->identity->getId());
//    }
}
