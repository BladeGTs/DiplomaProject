<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArrivalOfGoods */

$this->title = 'Изменить данные о приходе товара: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Приход товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="arrival-of-goods-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'employee' => $employee,
        'supplier' => $supplier,
    ])
    ?>

</div>
