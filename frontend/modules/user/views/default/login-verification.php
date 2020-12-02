<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model promocat\twofa\models\TwoFaForm */
/* @var $form ActiveForm */
?>
<div class="login-verification">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'code') ?>   
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- login-verification -->
