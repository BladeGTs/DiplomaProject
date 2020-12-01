<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArrivalOfGoods */

$this->title = 'Добавить приход товара';
$this->params['breadcrumbs'][] = ['label' => 'Приход товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arrival-of-goods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'employee'=>$employee,
        'supplier'=>$supplier,
        'product'=>$product,
    ]) ?>

</div>
