<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use common\widgets\Alert;
use frontend\assets\ErrorAsset;
ErrorAsset::register($this);

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html  lang="<?= Yii::$app->language ?>">

    <head>

        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,600" rel="stylesheet">

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        
        <?php $this->head() ?>
    </head>
    <body class = "menu-static menu-expanded">
        <?php $this->beginBody() ?>

    <div class="main-body">
                   <div class="page-body">
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
    <?php $this->endBody() ?>

</body>
    
</html>
<?php $this->endPage() ?>

