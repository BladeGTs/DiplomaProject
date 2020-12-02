<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use promocat\twofa\widgets\TwoFaQr;
$this->params['breadcrumbs'][] = ['label' => $model->user->nickname, 'url' => ['profile/view', 'nickname' => $model->user->nickname]];
$this->params['breadcrumbs'][] = Html::encode('Двухэтапная авторизация');
/* @var $this yii\web\View */
/* @var $model promocat\twofa\models\TwoFaForm */
/* @var $form ActiveForm */
?>
<div class="EnableTwoFa">
    <div>
        Отсканирйте QR код в приложении (Google Authenticator)
    </div>
    <?php $form = ActiveForm::begin(); ?>
            <?= TwoFaQr::widget([
            'accountName' => $model->user->username,
            'secret' => $model->secret,
            'issuer' => 'OptimSklad',
            'size' => 300
        ]); ?>
        <?= $form->field($model, 'secret')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'code') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- EnableTwoFa -->
