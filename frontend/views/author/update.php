<?php
/* @var $this yii\web\View */
/* @var $model frontend\models\Author */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Обновить автора: <?php echo $model->id;?></h1>

<?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, 'first_name'); ?>
    <?php echo $form->field($model, 'last_name'); ?>
    <?php echo $form->field($model, 'birthdate'); ?>
    <?php echo $form->field($model, 'rating'); ?>
    <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-primaru']);?>
<?php ActiveForm::end();
