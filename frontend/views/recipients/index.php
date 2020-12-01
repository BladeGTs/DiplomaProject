<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RecipientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recipients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipients-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Recipients', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'recipient_name',
            'inn',
            'legal_address',
            'phone_number',
            //'contac_person',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}',],
        ],
    ]); ?>
</div>
