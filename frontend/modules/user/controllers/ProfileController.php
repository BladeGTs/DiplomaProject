<?php

namespace frontend\modules\user\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\User;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\web\Response;
use frontend\modules\user\models\forms\PictureForm;
use app\modules\user\models\PasswordChangeForm;
use frontend\modules\user\models\ProfileUpdateForm;
use promocat\twofa\models\TwoFaForm;

class ProfileController extends Controller {

    
    public function actionEnableTwoFa($id) {
        $model = new TwoFaForm();
        $user = $this->findModel($id);

        if ($user->id !== Yii::$app->user->id) {
            throw new ForbiddenHttpException('You are not allowed to update this user.');
        }

        if ($user->hasTwoFaEnabled()) {
            Yii::$app->session->setFlash('error', 'Авторизация уже включена.');
            return $this->redirect(['view', 'nickname' => $user->nickname]);
        }

        $model->setUser($user);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nickname' => $user->nickname]);
        }
        return $this->render('EnableTwoFa', [
            'model' => $model,
        ]);
    }
    
            /**
     * Enables Two Factor Authentication an existing User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \yii\base\Exception
     */
    public function actionDisableTwoFa($id) {
        $user = $this->findModel($id);
        if ($user->id !== Yii::$app->user->id) {
            throw new ForbiddenHttpException('You are not allowed to update this user.');
        }
        if (!$user->hasTwoFaEnabled()) {
            Yii::$app->session->setFlash('error', 'Two-Factor authentication is not enabled.');
        } else {
            $user->disableTwoFa();
            Yii::$app->session->setFlash('success', 'Авторизация успешно отключена.');
        }
        return $this->redirect(['view', 'nickname' => $user->nickname]);
    }
    
    public function actionView($nickname) {

        /* @var $currentUser User */
        $user = $this->findModel();
        $model = new PasswordChangeForm($user);
        $profile = new ProfileUpdateForm($user);
        $currentUser = Yii::$app->user->identity;
        $modelPicture = new PictureForm();
        if ($profile->load(Yii::$app->request->post()) && $profile->update()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('view', [
                        'user' => $this->findUser($nickname),
                        'currentUser' => $currentUser,
                        'modelPicture' => $modelPicture,
                        'profile' => $profile,
            ]);
        }
    }
    /**
     * Action for change password
     * @return type
     */
    public function actionPasswordChange() {
        $user = $this->findModel();
        $model = new PasswordChangeForm($user);

        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('passwordChange', [
                        'model' => $model,
            ]);
        }
    }

    private function findModel() {
        return User::findOne(Yii::$app->user->identity->getId());
    }

    /**
     * Handle profile image upload via ajax request
     */
    public function actionUploadPicture() {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new PictureForm();
        $model->picture = UploadedFile::getInstance($model, 'picture');

        if ($model->validate()) {

            $user = Yii::$app->user->identity;
            $user->picture = Yii::$app->storage->saveUploadedFile($model->picture); // 15/27/30379e706840f951d22de02458a4788eb55f.jpg

            if ($user->save(false, ['picture'])) {
                return [
                    'success' => true,
                    'pictureUri' => Yii::$app->storage->getFile($user->picture),
                ];
            }
        }
        return ['success' => false, 'errors' => $model->getErrors()];
    }

    /**
     * @param string $nickname
     * @return User
     * @throws NotFoundHttpException
     */
    private function findUser($nickname) {
        if ($user = User::find()->where(['nickname' => $nickname])->orWhere(['id' => $nickname])->one()) {
            return $user;
        }
        throw new NotFoundHttpException();
    }

    /**
     * @param integer $nickname
     * @return User
     * @throws NotFoundHttpException
     */
    private function findUserById($id) {
        if ($user = User::findOne($id)) {
            return $user;
        }
        throw new NotFoundHttpException();
    }

}
