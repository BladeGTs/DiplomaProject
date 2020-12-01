<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ConsumptionOfGoods */

$this->title = 'Отправить';
$this->params['breadcrumbs'][] = ['label' => 'Расход товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumption-of-goods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
        'employee' => $employee,
        'recipients' => $recipients,
    ])
    ?>

</div>
