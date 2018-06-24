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
            <div class="slogan">html photo template</div>
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
                    <form name="search_form" method="post" action="#" class="search_form">
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

<div class="fixed_bg map_bg"></div>
<div class="content_bg"></div>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/modules.js"></script>
<script type="text/javascript" src="js/theme.js"></script>
<script>
    jQuery(document).ready(function(){
        "use strict";
        centerWindow();
        if (window_w > 760) {
            jQuery('html').addClass('without_border');
        }
    });
    jQuery(window).load(function(){
        "use strict";
        centerWindow();
    });
    jQuery(window).resize(function(){
        "use strict";
        centerWindow();
        setTimeout('centerWindow()',500);
        setTimeout('centerWindow()',1000);
    });
    function centerWindow() {
        "use strict";
        var setTop = (window_h - jQuery('.fw_content_wrapper').height() - header.height())/2+header.height();
        if (setTop < header.height()+50) {
            jQuery('.fw_content_wrapper').addClass('fixed');
            jQuery('body').addClass('addPadding');
            jQuery('.fw_content_wrapper').css('top', header.height()+50+'px');
        } else {
            jQuery('.fw_content_wrapper').css('top', setTop +'px');
            jQuery('.fw_content_wrapper').removeClass('fixed');
            jQuery('body').removeClass('addPadding');
        }
    }
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>