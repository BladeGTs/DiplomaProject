<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Recipients */

$this->title = 'Update Recipients: ' . $model->idRecipients;
$this->params['breadcrumbs'][] = ['label' => 'Recipients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idRecipients, 'url' => ['view', 'id' => $model->idRecipients]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recipients-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
