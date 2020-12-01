<?php
/* @var $model frontend\models\Employee */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
if($model->hasErrors())
{
    echo'<pre>';
    print_r($model->getErrors());
    echo'</pre>';
}
?>
<h1> Welcome to our company</h1>
<?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, 'firstName'); ?>
 <?php echo $form->field($model, 'lastName'); ?>
 <?php echo $form->field($model, 'middleName'); ?>
 <?php echo $form->field($model, 'email'); ?>
 <?php echo $form->field($model, 'birthday'); ?>
 <?php echo $form->field($model, 'position'); ?>
 <?php echo $form->field($model, 'idCode'); ?>
<?php echo $form->field($model, 'city')-> dropDownList($model->getCitiesList()); ?>
<?php echo Html::submitButton('Send',['class'=>'btn btn-primary']) ?>


<?php ActiveForm::end(); ?>
<!--<form method="POST">
    <p>First Name:</p>
    <input type ="text" name ="firstName"/>
    <br><br>
    
    <p>Second Name:</p>
    <input type ="text" name ="lastName"/>
    <br><br>
    
    <p>Middle Nmae:</p>
    <input type ="text" name ="middleName"/>
    <br><br>
    
    <p>Email:</p>
    <input type ="text" name ="email"/>
    <br><br>
    
    <input type ="submit"/>
</form>-->
