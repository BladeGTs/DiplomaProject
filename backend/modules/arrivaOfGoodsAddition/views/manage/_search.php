<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArrivalOfGoodsAdditionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arrival-of-goods-addition-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Idarrival') ?>

    <?= $form->field($model, 'Idproduct') ?>

    <?= $form->field($model, 'quantity_of_goods') ?>

    <?= $form->field($model, 'unit_price') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
