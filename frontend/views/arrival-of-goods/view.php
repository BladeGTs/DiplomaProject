<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArrivalOfGoods */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Приход товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="arrival-of-goods-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
             ['attribute' => 'supplier_name', 'label' => 'Название поставщика', 'value' => function($data) {
                    return $data->getParentName();
                }],
            ['attribute' => 'power_attorney_number', 'label' => 'Номер доверенности'],
            ['attribute' => 'power_Attorney_Date', 'label' => 'Дата выписки доверенности'],
            ['attribute' => 'fullname_received', 'label' => 'ФИО принявшего товар','value' => function($data) {
                    return $data->getFullNameReceived();
                }],
            ['attribute' => 'date_of_arrival_of_goods_to_the_warehouse', 'label' => 'Дата прихода товара на склад'],
        ],
    ]) ?>

</div>
