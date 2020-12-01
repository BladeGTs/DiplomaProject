<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Provider */

$this->title = 'Изменить информацию о поставщике ' . $model->idprovider;
$this->params['breadcrumbs'][] = ['label' => 'Providers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idprovider, 'url' => ['view', 'id' => $model->idprovider]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="provider-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
