<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 15.05.2015
 * Time: 23:20
 */
use yii\helpers\Html;
use frontend\widgets\Menu;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="fullscreen_page sticky_menu">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="img/favico.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple_icons_57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple_icons_72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple_icons_114x114.png">
    <title>Violgallery | Modern online gallery</title>
    <link href="http://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,900" rel="stylesheet" type="text/css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="main_header">
    <?= Html::csrfMetaTags() ?>
    <div class="header_wrapper">
        <div class="logo_sect">
            <a href="index.php" class="logo"><img src="img/logo.png" alt=""  class="logo_def"><img src="img/retina/logo.png" alt="" class="logo_retina"></a>
            <div class="slogan">modern online gallery</div>
        </div>
        <div class="header_rp">
            <nav>
                <div class="menu-main-menu-container">
                    <?= Menu::widget() ?>
                </div>
                <div class="search_fadder"></div>
                <div class="header_search">
                    <form name="search_form" method="get" action="#" class="search_form">
                        <input type="text" name="s" value="" placeholder="Search the site..." class="field_search">
                    </form>
                </div>
            </nav>
            <a class="search_toggler" href="#"></a>
        </div>
        <div class="clear"></div>
    </div>
</header>
    <?=$content?>
<div class="wrapper404">
    <div class="container404">
        <h1 class="title404">404 Error</h1>
        <form name="search_field" method="get" action="javascript:void(0);" class="search_form search404">
            <input type="text" name="s" value="" class="field_search">
            <a href="javascript:void(0);" class="search_button"><i class="icon-search"></i>Search</a>
        </form>
        <div class="clear"></div>
    </div>
</div>
<div class="custom_bg img_bg bg1"></div>

<div class="content_bg"></div>
<script>
    jQuery(document).ready(function(){
        "use strict";
        jQuery('.wrapper404').css('margin-top', -1*(jQuery('.wrapper404').height()/2)+(jQuery('header.main_header').height()-30)/2);
    });
    jQuery(window).resize(function(){
        "use strict";
        jQuery('.wrapper404').css('margin-top', -1*(jQuery('.wrapper404').height()/2)+(jQuery('header.main_header').height()-30)/2);
    });
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>