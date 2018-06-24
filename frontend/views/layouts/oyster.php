<?php

use yii\helpers\Html;
use frontend\widgets\Menu;

use frontend\widgets\Tags;
use frontend\widgets\RecentPost;
use frontend\widgets\CategoryPost;
use yii\web\Controller;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="sticky_menu">
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
                    <?=
                    Menu::widget()
                    ?>
                </div>
                <div class="search_fadder"></div>
                <?= $this->render('/post/_search', ['model' => $this->params['searchModel']]); ?>
            </nav>
            <a class="search_toggler" href="#"></a>
        </div>
        <div class="clear"></div>
    </div>
</header>

<div class="main_wrapper">
<div class="bg_sidebar is_left-sidebar"></div>
<div class="content_wrapper">
<div class="container">
<div class="content_block row left-sidebar">
<div class="fl-container">
<div class="row">
    <?= $content ?>
<div class="left-sidebar-block">

    <?= CategoryPost::widget() ?>

    <?= RecentPost::widget([
        'maket' => 'main',
        'limit' => 3
    ]) ?>

    <?= Tags::widget([
        'maket' => 'main',
        'limit' => 20
    ]) ?>


    <div class="sidepanel widget_text">
        <h6 class="sidebar_header">Text Widget</h6>
        <div class="textwidget">Suscipit eleifend ante quis, ac cursus elit, сurabitur pulvinar, dolor vel euismod condimentum, tortor dolor suscipit est, nest interdum augue leo dolor nulla libero tellus eget nec.</div>
    </div>

</div>
</div>
</div>
</div>
</div>
</div>
</div><!-- .main_wrapper -->

<footer>
    <div class="footer_wrapper container">
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

<script>
    jQuery(document).ready(function(){
        "use strict";
        jQuery('.commentlist').find('li').each(function(){
            if (jQuery(this).find('ul').size() > 0) {
                jQuery(this).addClass('has_ul');
            }
        });
        jQuery('.form-allowed-tags').width(jQuery('#commentform').width() - jQuery('.form-submit').width() - 13);

        jQuery('.pf_output_container').each(function(){
            if (jQuery(this).html() == '') {
                jQuery(this).parents('.blog_post_page').addClass('no_pf');
            } else {
                jQuery(this).parents('.blog_post_page').addClass('has_pf');
            }
        });
    });
    jQuery(window).resize(function(){
        "use strict";
        jQuery('.form-allowed-tags').width(jQuery('#commentform').width() - jQuery('.form-submit').width() - 13);
    });
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>