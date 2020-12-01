<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArrivalOfGoods */

$this->title = 'Create Arrival Of Goods';
$this->params['breadcrumbs'][] = ['label' => 'Arrival Of Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arrival-of-goods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
                'employee' => $employee,
        'supplier'=>$supplier,
        'product'=>$product,
    ]) ?>

</div>
