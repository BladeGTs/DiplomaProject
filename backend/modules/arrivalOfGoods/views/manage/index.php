<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\widgets\Alert;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArrivalOfGoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Приход товара';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arrival-of-goods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Добавить приход товара', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
        <?php Pjax::begin(['id' => 'pjax-container']); ?>
    <?= Alert::widget() ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [   'label'=> 'Поставщик',
                'attribute' => 'providerName',
                'value' => 'supplierName.supplier_name',
            ],
             ['attribute' => 'products', 'label' => 'Продукты','value' =>  function($data) {
                    $str ='';
                    foreach($data['products'] as $item)
                    {
                        $str.=$item['Name'].', ';
                    }
                    return $str;
                },],
            'power_attorney_number',
                                    [
                'attribute' => 'date_of_arrival_of_goods_to_the_warehouse',
                'label' => 'Дата прихода на склад',
                'format' => 'date',
                'filter' => DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'createTimeRange',
                    'convertFormat' => true,
                    'startAttribute' => 'createTimeStart',
                    'endAttribute' => 'createTimeEnd',
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'Y-m-d',
                        ]
                    ]
                ]),
            ],
            [
                'label'=> 'ФИО принявшего товар',
                'attribute' => 'fullNameArrived',
                'value' => 'fullNameReceived',
            ],
                        [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'delete' => function ($url) {
                        $iconName = "trash";
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);
                        return Html::a($icon, '#', [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'aria-label' => Yii::t('yii', 'Delete'),
                                    'onclick' => "
                                if (confirm('Вы действительно хотите удалить?')) {
                                    $.ajax('$url', {
                                        type: 'POST'
                                    }).done(function(data) {
                                        $.pjax.reload({container: '#pjax-container'});
                                    });
                                }
                                return false;
                            ",
                        ]);
                    },
                ],
            ],
        ],
    ]);
    ?>
    <?php Pjax::end() ?>

</div>
