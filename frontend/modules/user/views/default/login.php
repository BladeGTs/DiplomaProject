<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\assets\LoginAssets;
LoginAssets::register($this);
?>
<head>
    <title>
       Вход 
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
                        $form = ActiveForm::begin(['id' => 'login-form', 'options' => [
                                        'class' => 'md-float-material'
                                    ], 'fieldConfig' => ['template' => "{input}\n{error}", 'options' => ['class' => 'text-inverse',],],]);
                        ?>
                            <div class="text-center">
                                <img src="/img/logo.png" alt="logo.png">
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Вход</h3>
                                    </div>
                                </div>
                                <hr/>
                                    <?= $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder'=>'Ваш Email Адрес'])->label(false) ?>
                                    <span class="md-line"></span>
                                     <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Пароль'])->label(false) ?>
                                    <span class="md-line"></span>

                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-7 col-xs-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <?=
                                            $form->field($model, 'rememberMe', ['template' =>
                                                '<label>{input} 
                        <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                        <span class="text-inverse">Запомнить меня?</span>
                    </label>'])->checkbox([], false)
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                        <?= Html::a('Забыли пароль?', ['/user/default/request-password-reset'],['class'=>'text-right f-w-600 text-inverse']) ?>
                                    </div>

                                </div>
                                    <?=$form->field($model, 'reCaptcha',['template'=>'{input}'])->widget(
                                            \himiklab\yii2\recaptcha\ReCaptcha::class
                                    )?>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <?= Html::submitButton('Вход', ['class' => 'btn btn-primary btn-md btn-block waves-effect text-center m-b-20', 'name' => 'login-button']) ?>
                                    </div>
                                </div>
                                <hr/>

                            </div>
                            <?php ActiveForm::end(); ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    </body

        
