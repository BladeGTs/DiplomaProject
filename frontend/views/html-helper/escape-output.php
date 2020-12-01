<?php
use yii\helpers\Html;

?>

<?php foreach($comments as $comment): ?>
<?php echo Html::tag('h5',Html::encode($comment['author'])); ?>
<?php echo Html::tag('p',Html::encode($comment['text'])); ?>
<ht/>
<?php endforeach; ?>


<?php $string = '</b><script> alert("Iwill"); </script>' ;
//echo Html::encode($string); //Экранирование строк