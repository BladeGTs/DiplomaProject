<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ConsumptionOfGoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Расход товара';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumption-of-goods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Отправить товар поставщику', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'ID_consumption',
            ['attribute' => 'RecipientsName','label'=>'Наименования получателя',
                'value' => 'recipientsName.recipient_name'],
            'agreement_number',
            //'power_of_Attorney_Date',
            
            ['attribute' => 'products', 'label' => 'Продукты', 'value' => function($data) {
                    $str = '';
                    foreach ($data['products'] as $item) {
                        $str .= $item['Name'] . ', ';
                    }
                    return $str;
                },],
            [   'label'=>'ФИО сдавшего товар',
                'attribute' => 'fullNameReceived',
                'value' => 'fullNameDelivered'],
                        
            'date_of_consumption_of_goods_from_stock',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
