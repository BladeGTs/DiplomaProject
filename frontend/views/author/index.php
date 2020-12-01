<?php
/* @var $this yii\web\View */
/* @var $authorList[] frontend\models\Author */
use yii\helpers\Url;
use yii\helpers\Html;
?>
<h1>author/index</h1>
<a href="<?php echo Url::to(['author/create']); ?>" class='btn btn-primary'>Create new Author</a>
<table class = "table-condensed">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Edit</th>
        <th>Delete</th>
        
    </tr>
<?php foreach ($authorList as $author): ?>
    <tr>
        <td><?php echo $author->id; ?></td>
        <td><?php echo Html::encode($author->first_name); ?></td>
        <td><?php echo Html::encode($author->last_name); ?></td>
        <td><a href="<?php echo Url::to(['author/update','id'=>$author->id]);?>">Изменить</a></td>
        <td><a href="<?php echo Url::to(['author/delete','id'=>$author->id]);?>">Удалить</a></td>
    </tr>
    
<?php endforeach; ?>
</table>
