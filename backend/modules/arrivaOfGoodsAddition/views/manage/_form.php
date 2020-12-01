<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArrivalOfGoodsAddition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arrival-of-goods-addition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Idarrival')->textInput(['disabled'=>true]) ?>

    <?= $form->field($model, 'Idproduct')->textInput(['disabled'=>true]) ?>

    <?= $form->field($model, 'quantity_of_goods')->textInput() ?>

    <?= $form->field($model, 'unit_price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
