<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Provider */

$this->title = 'Изменить посавщика: ' . $model->supplier_name;
$this->params['breadcrumbs'][] = ['label' => 'Поставщики', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->supplier_name, 'url' => ['view', 'id' => $model->idprovider]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="provider-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
