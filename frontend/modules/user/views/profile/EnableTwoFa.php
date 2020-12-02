<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use promocat\twofa\widgets\TwoFaQr;

/* @var $this yii\web\View */
/* @var $model promocat\twofa\models\TwoFaForm */
/* @var $form ActiveForm */
?>
<div class="EnableTwoFa">

    <?php $form = ActiveForm::begin(); ?>

    //    <?= $form->field($model, 'secret') ?>
            <?= TwoFaQr::widget([
            'accountName' => $model->user->username,
            'secret' => $model->secret,
            'issuer' => 'OptimSklad',
            'size' => 300
        ]); ?>
        <?= $form->field($model, 'code') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- EnableTwoFa -->
