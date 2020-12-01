<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Recipients */

$this->title = 'Create Recipients';
$this->params['breadcrumbs'][] = ['label' => 'Recipients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipients-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
