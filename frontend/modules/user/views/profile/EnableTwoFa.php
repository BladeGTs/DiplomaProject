<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use promocat\twofa\widgets\TwoFaQr;

$this->params['breadcrumbs'][] = ['label' => $model->user->nickname, 'url' => ['profile/view', 'nickname' => $model->user->nickname]];
$this->params['breadcrumbs'][] = Html::encode('Двух-факторная аутентификация');
/* @var $this yii\web\View */
/* @var $model promocat\twofa\models\TwoFaForm */
/* @var $form ActiveForm */
?>
<div class="EnableTwoFa">
    <div>
        <?= Html::a(Yii::t('yii2-twofa', 'Scan the QR code in the app (Google Authenticator)')); ?>
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
        <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- EnableTwoFa -->
