<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label('Email'); ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Пароль'); ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить меня') ?>
                <?=
                $form->field($model, 'reCaptcha',['template'=>'{input}'])->widget(
                        \himiklab\yii2\recaptcha\ReCaptcha::className()
                )
                ?>
                <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
