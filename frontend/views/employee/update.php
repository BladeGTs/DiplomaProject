<?php
/* @var $model frontend\models\Employee */
if($model->hasErrors())
{
    echo'<pre>';
    print_r($model->getErrors());
    echo'<pre>';
}
?>
<h1> Update your details</h1>

<form method="POST">
    <p>First Name:</p>
    <input type ="text" name ="firstName"/>
    <br><br>
    
    <p>Second Name:</p>
    <input type ="text" name ="lastName"/>
    <br><br>
    
    <p>Middle Nmae:</p>
    <input type ="text" name ="middleName"/>
    <br><br>
    
    
    <input type ="submit"/>
</form>