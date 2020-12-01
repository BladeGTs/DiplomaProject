<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\employee\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить сотрудника', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(['id' => 'pjax-container']); ?>
    <?= Alert::widget() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'first_name',
            'middle_name',
            'last_name',
            'birthday',
            //'city',
            'id_code',
            //'email:email',
            //'phone',

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
    ]); ?>
    <?php Pjax::end() ?>
</div>
