<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArrivalOfGoodsAdditionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Arrival Of Goods Additions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arrival-of-goods-addition-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'Idarrival',
                'value'=>'numberTTN.power_attorney_number'],
            ['attribute'=>'Idproduct',
                'value'=>'product.Name'],
            'quantity_of_goods',
            'unit_price',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'],
        ],
    ]); ?>
</div>
