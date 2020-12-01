<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use nex\chosen\Chosen;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\ArrivalOfGoods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arrival-of-goods-form">
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'supplier_name')->dropDownList($supplier) ?>

    <?= $form->field($model, 'power_attorney_number')->textInput(['maxlength' => true]) ?>
    <?=
    $form->field($model, 'power_Attorney_Date')->widget(
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


    <?= $form->field($model, 'fullname_received')->label('ФИО принявшего товар')->dropDownList($employee) ?>
    <?=
    $form->field($model, 'date_of_arrival_of_goods_to_the_warehouse')->widget(
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
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
             
    <?php ActiveForm::end(); ?>

</div>
