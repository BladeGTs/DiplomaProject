<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nex\chosen\Chosen;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'barcode')->textInput() ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Product_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Units')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Manufacturer_Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Country_of_Origin')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
