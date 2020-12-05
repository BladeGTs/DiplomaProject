<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;



AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html  lang="<?= Yii::$app->language ?>">

    <head>

        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script type="text/javascript" src="/bootstraptema.ru/assets/js/demo-template.js"></script>
        <script type="text/javascript" src="/bootstraptema.ru/assets/js/jquery-1.10.2.js"></script>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        
        <?php $this->head() ?>
    </head>
    <body class = "menu-static menu-expanded">
        <?php $this->beginBody() ?>
        <nav class ="header-navbar"> 
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <span class="ti-menu"></span>
                    </a>
                    <a class="mobile-search morphsearch-search" href="#">
                        <span class="ti-search"></span>
                    </a>
                    <a href="<?= Yii::$app->homeUrl ?>">
                        <img class="img-fluid" style="max-width: 190px; padding-top: 17px;" src="/img/logo.png" alt="Theme-Logo">

                    </a>
                    <a class="mobile-options">
                        <span class="ti-more"></span>
                    </a>
                </div>
                <div class ="navbar-container container-fluid">
                                   
                    <?php
                            if(Yii::$app->user->identity)
        {
                    $menuPrifileItems = [
                        ['label' => 'Профиль', 'url' => ['user/profile/view','nickname'=>Yii::$app->user->identity->nickname]],
                        ['label' => 'Выход', 'url' => ['/user/default/logout']],
                    ];
        }
                    ?>
                    <ul class="nav-left">
                        <li>
                            <a id="collapse-menu" href="#">
                                <i class="ti-menu"></i>
                            </a>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">

                                <i class="ti-search"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="ti-fullscreen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class ="user-profile header-notification">
                            <a href="#">
                                
                                <img src="<?php if(Yii::$app->user->identity) {
    echo Yii::$app->user->identity->getPicture();
}
?>" id="profile-picture-right"  class="img-fluid rounded-circle" style="max-width: 40px;" /> 
                                <span class="name-user">
                                    <?php 
                                if (!Yii::$app->user->identity) {
                                       echo'Гость'; 
                                    }else{
                                    
                                    echo Yii::$app->user->identity->username;
                                    
                               echo' </span>
                                <i class="fa fa-chevron-down ti-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li><a href="#"><i class="ti-user"></i>Профиль</a></li>
                                <li><a href="/user/logout"><i class="ti-layout-sidebar-left"></i>Выход</a></li>

                            </ul>';
                                        }
                                    ?>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="main-menu" id="menu-static">
            <div class="main-menu-header">
                <img src="<?php         if(Yii::$app->user->identity)
        {echo Yii::$app->user->identity->getPicture(); }?>" id="profile-picture-left"  class="img-fluid rounded-circle" style="max-width: 40px;" /> 
                <div class="user-details">
                    <span id="more-details">
                        <?php
                        if (Yii::$app->user->identity) {
                            echo Yii::$app->user->identity->username;
                        } else {
                            echo'Гость';
                        }
                        ?><i class="ti-angle-down"></i>
                    </span>
                    
                </div>
            </div>
            <div class="main-menu-content">
                <ul class="main-navigation">
                    <li class="more-details" style="display: none;">
                        <a href ="<?php if (Yii::$app->user->identity) {
                            echo Url::to(['/user/profile/view', 'nickname' => Yii::$app->user->identity->nickname]);}?>"><i class="ti-user"></i>Профиль</a>
                        <a href="/user/default/logout"><i class="ti-layout-sidebar-left"></i>Выход</a>
                    </li>
                    
                    <li class="nav-title" data-i18n="nav.category.navigation">
                        <i class="ti-line-dashed"></i>
                        <span>Навигация</span>
                    </li>
                    <?php  $menuItems3 = [
                            ['label' => 'Домой','url' => ['/site/index'],'template' => '<a href="{url}"><i class ="ti-home"></i><span data-i18n="nav.dash.main">{label}</span></a>'],
                            ['label' => 'Регистрация', 'url' => ['/user/default/signup'],'visible'=>Yii::$app->user->isGuest,'template' => '<a href="{url}"><i class ="ti-id-badge"></i><span data-i18n="nav.dash.main">{label}</span></a>'],
                            ['label' => 'Вход', 'url' => ['/user/default/login'],'visible'=>Yii::$app->user->isGuest,'template' => '<a href="{url}"><i class ="ti-unlock"></i><span data-i18n="nav.dash.main">{label}</span></a>'],
                         
                          ];

                          echo Menu::widget([
                        
                        'itemOptions' => ['class' => 'nav-item single-item'],
                              'encodeLabels' => false,
                        'items' => $menuItems3,
                              'activeCssClass'=>"has-class"
                    ]);
                    ?>

                    <li class="nav-title" data-i18n="nav.category.navigation">
                        <i class="ti-line-dashed"></i>
                        <span>Действия с базой </span>
                    </li>
                    <li class="nav-item">
                        <a href="#!">
                            <i class="ti-home"></i>
                            <span data-i18n="nav.dash.main">Действия с базой</span>
                        </a>

                        <?php
                        $menuItems = [
                            ['label' => 'Поставщики', 'url' => ['/provider/index']],
                            ['label' => 'Товары', 'url' => ['/product/index']],
                            ['label' => 'Получатели', 'url' => ['/recipients/index']],
                            ['label' => 'Приход товара', 'url' => ['/arrival-of-goods/index']],
                            ['label' => 'Расход товара', 'url' => ['/consumptionOfGoods/manage/index']],
                        ];

                echo Menu::widget([

                                'options' => ['class' => 'tree-1'],

                                'items' => $menuItems,
                                'activeCssClass' => 'has-class',
                    'itemOptions'=>['class'=>'item'],
                    'activateParents'=>true,
                            ]);
                                            ?>
                    </li>

                </ul>
            </div>
        </div>

    <div class="main-body">
        <div class="page-wrapper">
            <div class ="page-header">
            <div class = "page-header-title">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
            </div>
            </div>
            <div class="page-body">
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>
        <script>

        if($(".item").hasClass("has-class"))
        {
            $("li.item").parent().parent('li.nav-item').addClass("has-class");
        }
        </script>
</body>
    
</html>
<?php $this->endPage() ?>

