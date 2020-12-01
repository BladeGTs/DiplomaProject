<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1>Привет</h1>
<div class="col-md-12">
<?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model,'keyword'); ?>
    
    <?php echo Html::submitButton('Поиск',['class'=> 'btn btn-primary']); ?>
<?php ActiveForm::end(); ?>
</div>
<hr>
<div class ="col-md-8">
    <?php if ($result):?>
    <?php foreach($result as $item): ?>
         <?php echo $item['title']; ?>
    <hr>
         <?php echo $item['content']; ?>
    <?php endforeach; ?>
    <?php endif; ?>
</div>