<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ArrivalOfGoodsAddition */

$this->title = 'Update Arrival Of Goods Addition: ' . $model->Idarrival;
$this->params['breadcrumbs'][] = ['label' => 'Arrival Of Goods Additions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Idarrival, 'url' => ['view', 'Idarrival' => $model->Idarrival, 'Idproduct' => $model->Idproduct]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="arrival-of-goods-addition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
