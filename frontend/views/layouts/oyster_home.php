<?php

use yii\helpers\Html;
use frontend\widgets\Menu;
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
                    <?= Menu::widget();?>
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

<div class="fs_fadder hided"></div>
<div class="fs_sharing_wrapper hided">
    <div class="fs_sharing">
        <a href="javascript:void(0);" class="share_facebook"><i class="icon-facebook-square"></i></a>
        <a href="javascript:void(0);" class="share_pinterest"><i class="icon-pinterest"></i></a>
        <a href="javascript:void(0);" class="share_tweet"><i class="icon-twitter"></i></a>
        <a href="javascript:void(0);" class="share_gplus"><i class="icon-google-plus-square"></i></a>
        <a class="fs_share_close hided" href="javascript:void(0)"></a>
    </div>
</div>
<div class="content_bg"></div>

<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/modules.js"></script>
<script type="text/javascript" src="js/theme.js"></script>

<script>
    gallery_set = [
       <?= $content ?>
    ]

    jQuery(document).ready(function(){
        "use strict";
        jQuery('html').addClass('hasPag');
        jQuery('body').fs_gallery({
            fx: 'fade', /*fade, zoom, slide_left, slide_right, slide_top, slide_bottom*/
            fit: 'no_fit',
            slide_time: 3300, /*This time must be < then time in css*/
            autoplay: 1,
            show_controls: 1,
            slides: gallery_set
        });
        jQuery('.fs_share').click(function(){
            jQuery('.fs_fadder').removeClass('hided');
            jQuery('.fs_sharing_wrapper').removeClass('hided');
            jQuery('.fs_share_close').removeClass('hided');
        });
        jQuery('.fs_share_close').click(function(){
            jQuery('.fs_fadder').addClass('hided');
            jQuery('.fs_sharing_wrapper').addClass('hided');
            jQuery('.fs_share_close').addClass('hided');
        });
        jQuery('.fs_fadder').click(function(){
            jQuery('.fs_fadder').addClass('hided');
            jQuery('.fs_sharing_wrapper').addClass('hided');
            jQuery('.fs_share_close').addClass('hided');
        });

        jQuery('.close_controls').click(function(){
            if (jQuery(this).hasClass('open_controls')) {
                jQuery('.fs_controls').removeClass('hide_me');
                jQuery('.fs_title_wrapper ').removeClass('hide_me');
                jQuery('.fs_thmb_viewport').removeClass('hide_me');
                jQuery('header.main_header').removeClass('hide_me');
                jQuery(this).removeClass('open_controls');
            } else {
                jQuery('header.main_header').addClass('hide_me');
                jQuery('.fs_controls').addClass('hide_me');
                jQuery('.fs_title_wrapper ').addClass('hide_me');
                jQuery('.fs_thmb_viewport').addClass('hide_me');
                jQuery(this).addClass('open_controls');
            }
        });

        jQuery('.main_header').removeClass('hided');
        jQuery('html').addClass('without_border');
    });
</script>
<script type="text/javascript" src="js/fs_gallery.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>