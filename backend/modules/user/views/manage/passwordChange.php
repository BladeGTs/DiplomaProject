<?php
 
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
 
/* @var $this yii\web\View */
/* @var $model app\modules\user\models\ChangePasswordForm */
 
$this->title = Yii::t('app', 'Смена пароля');
$this->params['breadcrumbs'][] = ['label'=>'Пользователи','url'=>['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $user->username), 'url' => ['manage/view/','id' => $user->id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-profile-password-change">
 
    <h1><?= Html::encode($this->title) ?></h1>
 
    <div class="user-form">

        <?php $form = ActiveForm::begin(); ?>
        
        <?= $form->field($model, 'newPassword')->passwordInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'newPasswordRepeat')->passwordInput(['maxlength' => true]) ?>
 
        <div class="form-group">
            <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
        </div>
 
        <?php ActiveForm::end(); ?>
 
    </div>
 
</div>