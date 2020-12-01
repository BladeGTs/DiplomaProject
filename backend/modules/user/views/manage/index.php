<?php

use yii\helpers\Html;
use Yii;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;
use kartik\daterange\DateRangePicker;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?= Html::a('Добавить нового пользователя', ['create'], ['class' => 'btn btn-success']) ?>

    </p>
    <?php Pjax::begin(['id' => 'pjax-container']); ?>
    <?= Alert::widget() ?>
    
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',],
            ['attribute' => 'picture',
                'format' => 'raw',
                'value' => function($user) {
                    return Html::img($user->getImage(), ['width' => '50px']);
                }
            ],
            'username',
            'email:email',
            [
                'attribute' => 'created_at',
                'label' => 'Создан',
                'format' => 'date',
                'filter' => DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'createTimeRange',
                    'convertFormat' => true,
                    'startAttribute' => 'createTimeStart',
                    'endAttribute' => 'createTimeEnd',
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'd.m.Y',
                        ]
                    ]
                ]),
            ],
            ['attribute' => 'roleName', 'label' => 'Роль', 'value' => function($data) {
                    $str = '';
                    foreach ($data['role'] as $item) {
                        $str .= $item['name'] . ', ';
                    }
                    return $str;
                },],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Функционал',
                'options'=>['margin-left'=>'30px',],
                'template' => '{view} {update} {delete}',
                'headerOptions' => ['width' => '80'],
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
    <?php Pjax::end(); ?>

</div>
