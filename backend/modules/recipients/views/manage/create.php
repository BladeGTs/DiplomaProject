<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Recipients */

$this->title = 'Добавить получателя';
$this->params['breadcrumbs'][] = ['label' => 'Получатели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipients-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
