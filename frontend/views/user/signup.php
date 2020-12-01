<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Регистрация';
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <?php $form = ActiveForm::begin(['id' => 'form-signup','options' => ['class' => 'form-horizontal']]); ?>
            <span class="heading">АВТОРИЗАЦИЯ</span>
            <div class="form-group">
                <?= $form->field($model, 'username', ['template' => '{input}<i class="fa fa-user"></i>{error}', 'enableLabel' => false])->textInput(['placeholder' => 'Имя пользователя', 'autofocus' => true]) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'username', ['template' => '{input}<i class="fa fa-user"></i>{error}', 'enableLabel' => false])->textInput(['placeholder' => 'Имя пользователя', 'autofocus' => true]) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'password', ['template' => '{input}<i class="fa fa-lock"></i>{error}', 'enableLabel' => false])->passwordInput(['placeholder' => 'Пароль']) ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Вход', ['class' => 'btn btn-default', 'name' => 'login-button']) ?>
                <?= Html::a("Регистрация", '/user/signup'); ?>
            </div>
            
            <?php ActiveForm::end(); ?>
        </div>
    </div><!-- /.row -->
</div><!-- /.container -->
</div>