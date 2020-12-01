<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\employee\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_product') ?>

    <?= $form->field($model, 'barcode') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'Product_group') ?>

    <?= $form->field($model, 'Units') ?>

    <?php // echo $form->field($model, 'Manufacturer_Name') ?>

    <?php // echo $form->field($model, 'Country_of_Origin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
