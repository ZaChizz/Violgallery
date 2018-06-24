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
        jQuery(document).ready(function($){
            "use strict";
            jQuery('#ribbon_swipe').on("swipeleft",function(e){
                next_slide();
            });
            jQuery('#ribbon_swipe').on("swiperight",function(e){
                prev_slide();
            });
            jQuery('.ltl_prev').click(function(){
                prev_slide();
            });
            jQuery('.ltl_next').click(function(){
                next_slide();
            });
            jQuery('.btn_prev').click(function(){
                prev_slide();
            });
            jQuery('.btn_next').click(function(){
                next_slide();
            });

            jQuery('.slide1').addClass('currentStep');
            jQuery('.slider_caption').text(jQuery('.currentStep').attr('data-title'));

            ribbon_setup();
        });
        jQuery(window).resize(function($){
            "use strict";
            ribbon_setup();
            setTimeout("ribbon_setup()",500);
            setTimeout("ribbon_setup()",1000);
        });
        jQuery(window).load(function($){
            "use strict";
            ribbon_setup();
            setTimeout("ribbon_setup()",700);
        });

        function ribbon_setup() {
            "use strict";
            var setHeight = window_h - header.height() - 20;
            var setHeight2 = window_h - header.height() - jQuery('.slider_info').height() - 20;
            jQuery('.fs_grid_gallery').height(window_h - header.height()-1);
            jQuery('.currentStep').removeClass('currentStep');
            jQuery('.slide1').addClass('currentStep');
            jQuery('.slider_caption').text(jQuery('.currentStep').attr('data-title'));
            jQuery('.num_current').text('1');

            jQuery('.num_all').text(jQuery('.ribbon_list li').size());
            jQuery('.ribbon_wrapper').height(setHeight2);
            jQuery('.ribbon_list .slide_wrapper').height(setHeight2);
            jQuery('.ribbon_list').height(setHeight2).width(20).css('left', 0);
            jQuery('.fs_grid_gallery').width(window_w);
            jQuery('.ribbon_list').find('li').each(function(){
                jQuery('.ribbon_list').width(jQuery('.ribbon_list').width()+jQuery(this).width());
                jQuery(this).attr('data-offset',jQuery(this).offset().left);
                jQuery(this).width(jQuery(this).find('img').width()+parseInt(jQuery(this).find('.slide_wrapper').css('margin-left')));
            });
            var max_step = -1*(jQuery('.ribbon_list').width()-window_w);
        }
        function prev_slide() {
            "use strict";
            var max_step = -1*(jQuery('.ribbon_list').width()-window_w);
            var current_slide = parseInt(jQuery('.currentStep').attr('data-count'));
            current_slide--;
            if (current_slide < 1) {
                current_slide = jQuery('.ribbon_list').find('li').size();
            }
            jQuery('.currentStep').removeClass('currentStep');
            jQuery('.num_current').text(current_slide);
            jQuery('.slide'+current_slide).addClass('currentStep');
            jQuery('.slider_caption').text(jQuery('.currentStep').attr('data-title'));
            if (-1*jQuery('.slide'+current_slide).attr('data-offset') > max_step) {
                jQuery('.ribbon_list').css('left', -1*jQuery('.slide'+current_slide).attr('data-offset'));
            } else {
                jQuery('.ribbon_list').css('left', max_step);
            }
        }
        function next_slide() {
            "use strict";
            var max_step = -1*(jQuery('.ribbon_list').width()-window_w);
            var current_slide = parseInt(jQuery('.currentStep').attr('data-count'));
            current_slide++;
            if (current_slide > jQuery('.ribbon_list').find('li').size()) {
                current_slide = 1
            }
            jQuery('.currentStep').removeClass('currentStep');
            jQuery('.num_current').text(current_slide);
            jQuery('.slide'+current_slide).addClass('currentStep');
            jQuery('.slider_caption').text(jQuery('.currentStep').attr('data-title'));
            if (-1*jQuery('.slide'+current_slide).attr('data-offset') > max_step) {
                jQuery('.ribbon_list').css('left', -1*jQuery('.slide'+current_slide).attr('data-offset'));
            } else {
                jQuery('.ribbon_list').css('left', max_step);
            }
        }
    </script>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>