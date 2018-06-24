<?php

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
<div class="preloader"></div>
<footer class="fullwidth">
    <div class="footer_wrapper">
        <div class="copyright">Copyright &copy; 2014 Oyster HTML Template. All Rights Reserved.</div>
        <div class="socials_wrapper">
            <ul class="socials_list">
                <li><a class="ico_social_dribbble" target="_blank" href="http://dribbble.com/" title="Dribbble"></a></li>
                <li><a class="ico_social_gplus" target="_blank" href="https://plus.google.com/" title="Google+"></a></li>
                <li><a class="ico_social_vimeo" target="_blank" href="https://vimeo.com/" title="Vimeo"></a></li>
                <li><a class="ico_social_pinterest" target="_blank" href="http://pinterest.com" title="Pinterest"></a></li>
                <li><a class="ico_social_facebook" target="_blank" href="http://facebook.com" title="Facebook"></a></li>
                <li><a class="ico_social_twitter" target="_blank" href="http://twitter.com" title="Twitter"></a></li>
                <li><a class="ico_social_instagram" target="_blank" href="http://instagram.com" title="Instagram"></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</footer>
<div class="content_bg"></div>

<script type="text/javascript">
    jQuery(document).ready(function($){
        "use strict";
        setTimeout(function(){
            jQuery('.fullscreen_block').removeClass('hided');
        },2500);
        setTimeout("jQuery('.preloader').remove()", 2700);
    });
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>