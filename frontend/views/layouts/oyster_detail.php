<?php

use frontend\assets\AppAsset;
use frontend\widgets\Menu;
use yii\helpers\Html;

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
<div class="message"><?php if ($msg = Yii::$app->session->getFlash('error')) { echo $msg; }  ?></div>
<?=$content?>

<div class="content_bg"></div>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/modules.js"></script>
<script type="text/javascript" src="js/theme.js"></script>
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