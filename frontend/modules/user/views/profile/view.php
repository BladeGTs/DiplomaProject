<?php
/* @var $this yii\web\View */
/* @var $user frontend\models\User */
/* @var $currentUser frontend\models\User */

/* @var $modelPicture frontend\modules\user\models\forms\PictureForm */

use yii\helpers\Html;
use dosamigos\fileupload\FileUpload;
use yii\widgets\ActiveForm;

$this->title = Html::encode($user->username);
$this->params['breadcrumbs'][] = Html::encode('Профиль');
?>
<div class="page-posts no-padding">
    <div class="row">
        <div class="page page-post col-sm-12 col-xs-12 post-82">
            <div class="blog-posts blog-posts-large">
                <div class="row">
                    <!-- profile -->
                    <article class="profile col-sm-12 col-xs-12">
                        <div class="profile-title">
                            <img src="<?php echo $user->getPicture(); ?>" id="profile-picture" class="author-image"
                                 style="max-width: 150px;"/>
                            <div class="author-name"><?= Html::encode($user->username); ?></div>
                            <?php if ($currentUser && $currentUser->equals($user)): ?>
                                <?=
                                FileUpload::widget([
                                    'model' => $modelPicture,
                                    'attribute' => 'picture',
                                    'url' => ['/user/profile/upload-picture'], // your url, this is just for demo purposes,
                                    'options' => ['accept' => 'image/*'],
                                    'clientEvents' => [
                                        'fileuploaddone' => 'function(e, data) {
                                            if (data.result.success) {
                                                $("#profile-image-success").show();
                                                $("#profile-image-fail").hide();
                                                $("#profile-picture").attr("src", data.result.pictureUri);
                                                $("#profile-picture-right").attr("src", data.result.pictureUri);
                                                $("#profile-picture-left").attr("src", data.result.pictureUri);
                                            } else {
                                                $("#profile-image-fail").html(data.result.errors.picture).show();
                                                $("#profile-image-success").hide();
                                            }
                                        }',
                                    ],
                                ]);
                                ?><br/><br/>
                                <?= Html::a(Yii::t('app', 'Сменить пароль'), ['password-change'], ['class' => 'btn btn-primary']) ?>
                                <br/><br/>
                                <?php if (!$user->hasTwoFaEnabled()): ?>
                                    <?= Html::a('Включить двухэтапную аутентификацию', ['/user/profile/enable-two-fa', 'id' => $user->id], ['class' => 'btn btn-primary']) ?>
                                <?php else: ?>
                                    <?= Html::a('Выключить двухэтапную аутентификацию', ['/user/profile/disable-two-fa', 'id' => $user->id], ['class' => 'btn btn-primary', 'data' => [
                                        'confirm' => 'Вы уверены что хотите удалить?',
                                        'method' => 'post',
                                    ],]) ?>
                                <?php endif; ?>
                                <br/><br/>
                                <?php \yii\widgets\Pjax::begin() ?>
                                <?php $form = ActiveForm::begin(['id' => 'form-signup',
                                    'options' => ['class' => 'md-float-material col-xs-5'],
                                    'fieldConfig' => ['template' => "{input}\n{error}",
                                        'options' => ['class' => 'text-inverse',],],]); ?>
                                <?= $form->field($profile, 'email')->textInput(['maxlength' => true]) ?>
                                <?= $form->field($profile, 'nickname')->textInput(['maxlength' => true]) ?>
                                <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary waves-effect',
                                    'name' => 'signup-button']) ?>
                                <?php ActiveForm::end(); ?>
                            <?php endif; ?>
                            <?php \yii\widgets\Pjax::end() ?>
                            <br/>
                            <br/>
                            <div class="alert alert-success display-none" id="profile-image-success"
                                 style="display: none">Изображение профиля изменено
                            </div>
                            <div class="alert alert-danger display-none" id="profile-image-fail"
                                 style="display: none"></div>
                        </div>
                    </article>
                </div>
            </div>
        </div>

    </div>
</div>





