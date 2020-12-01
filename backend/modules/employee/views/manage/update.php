<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Employee */

$this->title = 'Изменить данные о сотруднике: ' . $model->idworker;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idworker, 'url' => ['view', 'id' => $model->idworker]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
