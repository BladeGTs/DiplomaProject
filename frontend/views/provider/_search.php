<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProviderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="provider-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idprovider') ?>

    <?= $form->field($model, 'supplier_name') ?>

    <?= $form->field($model, 'code_inn') ?>

    <?= $form->field($model, 'legal_address') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'contact_person') ?>

    <?php // echo $form->field($model, 'position') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
