<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Recipients */

$this->title = 'Изменить получателя: ' . $model->recipient_name;
$this->params['breadcrumbs'][] = ['label' => 'Получатели', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->recipient_name, 'url' => ['view', 'id' => $model->idRecipients]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="recipients-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
