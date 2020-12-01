<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nex\chosen\Chosen;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\ConsumptionOfGoods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consumption-of-goods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recipient_name')->dropDownList($recipients) ?>

    <?= $form->field($model, 'agreement_number')->textInput(['maxlength' => true]) ?>

     <?=
    $form->field($model, 'power_of_Attorney_Date')->widget(
            DatePicker::className(), [
        // inline too, not bad
        'inline' => true,
        // modify template for custom rendering
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>


      <?= $form->field($model, 'fullname_delivered')->label('ФИО сдавшего товар')->dropDownList($employee) ?>

     <?=
    $form->field($model, 'date_of_consumption_of_goods_from_stock')->widget(
            DatePicker::className(), [
        // inline too, not bad
        'inline' => true,
        // modify template for custom rendering
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>
    <?=
    Chosen::widget([
    'model' => $model,
    'attribute' => 'products_list',
    'items' => ArrayHelper::map(
            common\models\Product::find()->select('id_product, Name')->asArray()->all(), 
        'id_product', 
        'Name'
    ),
        'placeholder'=>'Выберите товары',
    'multiple' => true,
]);
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
