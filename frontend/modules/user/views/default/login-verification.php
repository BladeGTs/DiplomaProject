<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\assets\LoginAssets;
LoginAssets::register($this);

/* @var $this yii\web\View */
/* @var $model promocat\twofa\models\TwoFaForm */
/* @var $form ActiveForm */
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
                    <div class="text-center">
                        <img src="/img/logo.png" alt="logo.png">
                    </div>
                    <div class="login-verification auth-box">
                        <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => [
                                        'class' => 'md-float-material'
                                    ], 'fieldConfig' => ['template' => "{label}\n{input}\n{error}", 'options' => ['class' => 'text-inverse',],],]); ?>
                        <?= $form->field($model, 'code')->label("Введите код из приложения для аутентификации") ?>
                        <span class="md-line"></span>
                        <div class="form-group">
                            <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-primary']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div><!-- login-verification -->
                </div>

            </div>
        </div>
    </div>
</section>
</body


