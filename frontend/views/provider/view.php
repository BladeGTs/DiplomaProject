<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Provider */

$this->title = $model->idprovider.','.$model->supplier_name;
$this->params['breadcrumbs'][] = ['label' => 'Поставщики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="provider-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idprovider',
            'supplier_name',
            'code_inn',
            'legal_address',
            'phone',
            'contact_person',
            'position',
        ],
    ]) ?>

</div>
