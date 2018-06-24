<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 18.10.2015
 * Time: 15:05
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
<title>Oyster | Html Photo Template</title>
<link href="http://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,900" rel="stylesheet" type="text/css">
<?php $this->head() ?>
</head>
<body>
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
    <div class="content_bg"></div>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/modules.js"></script>
	<script type="text/javascript" src="js/theme.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        "use strict";
        jQuery('html').addClass('without_border');

        var data_width = 100/jQuery('.strip-menu.vertical').attr('data-count');
        jQuery('.strip-menu.vertical').attr('data-width', data_width);
        jQuery('.strip-menu.vertical .strip-item').css({'width': data_width + '%'});

			if (window_w < 1025 && window_w > 760) {
                jQuery('.mobile-hover').click(function(){
                    jQuery('.hovered').removeClass('hovered');
                    jQuery(this).parent('.strip-item').addClass('hovered');
                });
            }
			if (window_w < 760 && jQuery('.strip-menu').hasClass('vertical')) {
                jQuery('.strip-menu').removeClass('vertical').addClass('was_vert');
            }
			strip_setup();
		});
		jQuery(window).resize(function(){
            "use strict";
            strip_setup();
            setTimeout("strip_setup()",500);
            setTimeout("strip_setup()",500);
        });
		function strip_setup() {
            "use strict";
            if (jQuery('.strip-menu').hasClass('vertical')) {
                jQuery('.strip-menu').height(window_h - header.height());
                jQuery('.strip-menu').find('h1').each(function(){
                    jQuery(this).width(jQuery('.strip-item').height());
                    jQuery(this).css({'margin-top' : (jQuery('.strip-item').height() - jQuery(this).height())/2, 'margin-left' : -1*(jQuery(this).width() - jQuery('.strip-item').width())/2});
				});
            } else {
                jQuery('.strip-menu').height(window_h - header.height());
                jQuery('.strip-menu').find('.strip-text').each(function(){
                    jQuery(this).css('margin-top' , (jQuery('.strip-item').height() - jQuery(this).height()-13)/2);
                });
            }
        }
	</script>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>