<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
 
/* @var $this yii\web\View */
/* @var $model app\modules\user\models\User */
 
$this->title = Yii::t('app', $model->userName);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Пользователи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-update">
 
    <h1><?= Html::encode($this->title) ?></h1>
 
    <div class="user-form">
    <?= Html::a(Yii::t('app', 'Сменить пароль'), ['password-change','id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php $form = ActiveForm::begin(); ?>
 
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'userName')->textInput() ?>
    <?= $form->field($model, 'nickName')->textInput() ?>
    <?= $form->field($model, 'roles')->checkboxList($model->getRolesDropdown()) ?>
        
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-primary']) ?>
        </div>
 
        <?php ActiveForm::end(); ?>
 
    </div>
 
</div>