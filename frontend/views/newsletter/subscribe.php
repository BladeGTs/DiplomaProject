<?php

use frontend\assets\GalleryAsset;
GalleryAsset::register($this);
$this->title ="Подпишитесь на новости";
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Description of the page',
]);
$this->params['breadcrumbs'] =[
    'Test1',
    ['label'=> 'Test 2','url'=>['/site/index']], 
    'Test3',
    'Test4',
];
if(Yii::$app->session->hasFlash('subscribeStatus'))
{
    echo Yii::$app->session->getFlash('subscribeStatus');
}
if($model->hasErrors())
{
    echo'<pre>';
    print_r($model->getErrors());
    echo'<pre>';
}
?>
<form method="POST">
    <p>Email:</p>
    <input type ="text" name ="email"/>
    <br><br>
    <input type ="submit"/>
    
</form>