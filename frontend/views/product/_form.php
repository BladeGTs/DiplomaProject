<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['id'=>'form-enter']); ?>

    <?= $form->field($model, 'barcode')->textInput() ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Product_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Units')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Manufacturer_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Country_of_Origin')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
