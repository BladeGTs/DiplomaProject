<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ConsumptionOfGoods */

$this->title = $model->ID_consumption;
$this->params['breadcrumbs'][] = ['label' => 'Расход товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="consumption-of-goods-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'recipientsName.recipient_name',
            'agreement_number',
            'power_of_Attorney_Date',
            ['attribute' => 'fullNameDelivered', 'label' => "ФИО отправившего товар"],
            'date_of_consumption_of_goods_from_stock',
            ['attribute' => 'products', 'label' => 'Продукты', 'value' => function($data) {
                    $str = '';
                    foreach ($data['products'] as $item) {
                        $str .= $item['Name'] . ', ';
                    }
                    return $str;
                },],
        ],
    ])
    ?>

</div>
