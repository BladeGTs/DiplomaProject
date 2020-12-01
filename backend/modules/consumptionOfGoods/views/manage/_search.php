<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ConsumptionOfGoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consumption-of-goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_consumption') ?>

    <?= $form->field($model, 'recipient_name') ?>

    <?= $form->field($model, 'agreement_number') ?>

    <?= $form->field($model, 'power_of_Attorney_Date') ?>

    <?= $form->field($model, 'fullname_received') ?>

    <?php // echo $form->field($model, 'fullname_delivered') ?>

    <?php // echo $form->field($model, 'date_of_consumption_of_goods_from_stock') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
