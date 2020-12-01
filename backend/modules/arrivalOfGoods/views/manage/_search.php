<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArrivalOfGoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arrival-of-goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'supplier_name') ?>

    <?= $form->field($model, 'power_attorney_number') ?>

    <?= $form->field($model, 'power_Attorney_Date') ?>

    <?= $form->field($model, 'fullname_delivered') ?>

    <?php // echo $form->field($model, 'fullname_received') ?>

    <?php // echo $form->field($model, 'date_of_arrival_of_goods_to_the_warehouse') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
