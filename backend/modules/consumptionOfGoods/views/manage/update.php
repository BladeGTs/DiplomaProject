<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ConsumptionOfGoods */

$this->title = 'Изменение ' . $model->ID_consumption;
$this->params['breadcrumbs'][] = ['label' => 'Расход товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_consumption, 'url' => ['view', 'id' => $model->ID_consumption]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="consumption-of-goods-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'employee' => $employee,
        'recipients' => $recipients,
    ])
    ?>

</div>
