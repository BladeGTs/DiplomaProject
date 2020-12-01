<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
                        ['attribute' => 'picture',
                'format' => 'raw',
                'value' => function($user) {
                    return Html::img($user->getImage(), ['width' => '120px']);
                }
            ],
            'username',
            'email:email',
            //'status',
            'created_at:datetime',
            'updated_at:datetime',
            //'about:ntext',
            //'type',
            'nickname',
                                [
                'attribute'=>'roles',
                'value'=> function($user){
                return implode(', ', $user->getRoles());
                }
                ],
        ],
    ]) ?>

</div>
