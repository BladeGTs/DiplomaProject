<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\LoginAssets;

LoginAssets::register($this);

?>
<head>
    <title>
       Регистрация 
    </title>
</head>
<body class="fix-menu">
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body">
                        <?php
                        $form = ActiveForm::begin(['id' => 'form-signup', 'options' => [
                                        'class' => 'md-float-material'
                                    ],'fieldConfig' => [ 'template' => "{input}\n{error}", 'options' => [ 'class' => 'text-inverse', ], ],]);
                        ?>

                        <div class="text-center">
                            <img src="/img/logo.png" alt="logo.png">
                        </div>
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Регистрация.</h3>
                                </div>
                            </div>
                            <hr/>
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Ваше имя пользователя'])->label(false) ?>
                            <span class="md-line"></span>
                            <?= $form->field($model, 'nickName')->textInput(['placeholder' => 'Ваше никнейм пользователя'])->label(false) ?>
                            <span class="md-line"></span>
                            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Ваш Email Адрес'])->label(false) ?>
                            <span class="md-line"></span>
                            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль'])->label(false) ?>
                            <span class="md-line"></span>
                                                                <div class="col-sm-12 col-xs-12 forgot-phone text-right">
                                        <?= Html::a('Вход', ['/user/default/login'],['class'=>'text-right f-w-600 text-inverse']) ?>
                                    </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary btn-md btn-block waves-effect text-center m-b-20"', 'name' => 'signup-button']) ?>
                                </div>
                            </div>
                            <hr/>

                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
</body>