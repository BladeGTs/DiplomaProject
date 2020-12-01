<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ArrivalOfGoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Приход товара';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arrival-of-goods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        <?= Html::a('Внести приход товара', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'providerName', 'label' => 'Название поставщика','value'=>'supplierName.supplier_name'],
            ['attribute' => 'power_Attorney_Date', 'label' => 'Дата выписки доверенности'],
            ['attribute' => 'products', 'label' => 'Продукты','value' =>  function($data) {
                    $str ='';
                    foreach($data['products'] as $item)
                    {
                        $str.=$item['Name'].', ';
                    }
                    return $str;
                },],
            ['attribute' => 'fullNameArrived', 'label' => 'ФИО принявшего товар','value'=>'fullNameReceived'],
            ['attribute' => 'date_of_arrival_of_goods_to_the_warehouse', 'label' => 'Дата прихода товара на склад'],
            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}'],
        ],
    ]); ?>
</div>
