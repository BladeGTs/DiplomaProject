<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ArrivalOfGoods */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Приход товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="arrival-of-goods-view">

    <h1><?= Html::encode($this->title)  ?></h1>

    <p>
        <?= Html::a('Изменить', ['Изменить', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['Удалить', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'supplierName.supplier_name',
            'power_attorney_number',
            'power_Attorney_Date',
            ['attribute'=>'fullname_delivered',
            'value'=>$model->getFullNameReceived()],
            'date_of_arrival_of_goods_to_the_warehouse',
        ],
    ])
    ?>

</div>
