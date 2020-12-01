<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RecipientsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipients-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idRecipients') ?>

    <?= $form->field($model, 'recipient_name') ?>

    <?= $form->field($model, 'inn') ?>

    <?= $form->field($model, 'legal_address') ?>

    <?= $form->field($model, 'phone_number') ?>

    <?php // echo $form->field($model, 'contac_person') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
