<?php

use yii\helpers\Html;
use frontend\widgets\Menu;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\widgets\Tags;
use frontend\widgets\RecentPost;
use yii\web\Controller;

?>

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
    <link rel="stylesheet" href="css/theme.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/responsive.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/custom.css" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
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

<div class="fullscreen_block hided">
<ul class="optionset" data-option-key="filter">
    <li class="selected"><a href="#filter" data-option-value="*">All Artists</a></li>
    <li><a data-option-value=".advertisement" href="#filter" title="View all post filed under advertisement">A</a></li>
    <li><a data-option-value=".cities" href="#filter" title="View all post filed under cities">B</a></li>
    <li><a data-option-value=".fashion" href="#filter" title="View all post filed under fashion">C</a></li>
    <li><a data-option-value=".nature" href="#filter" title="View all post filed under nature">D</a></li>
    <li><a data-option-value=".portrait" href="#filter" title="View all post filed under portrait">E</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">F</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">G</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">H</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">I</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">J</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">K</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">L</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">M</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">N</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">O</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">P</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">Q</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">R</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">S</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">T</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">U</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">V</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">W</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">X</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">Y</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">Z</a></li>
</ul>
<div class="fs_blog_module image-grid" id="list">
<div class="blogpost_preview_fw element stuff">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <?=
                Html::a('<img src="http://localhost/yii2-start-d2/images/post/540x368/test1.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>',['gallery/detail'])
            ?>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Lorem ipsum dolor</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>7715</span></div>
                <div class="gallery_likes gallery_likes_add already_liked">
                    <i class="stand_icon icon-heart"></i>
                    <span>129</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element advertisement">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <?=
                Html::a('<img src="http://localhost/yii2-start-d2/images/post/540x368/test2.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>', ['gallery/detail'])
            ?>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Integer nec odio</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>10187</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>132</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element stuff">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <?=
            Html::a('<img src="http://localhost/yii2-start-d2/images/post/540x368/test3.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>', ['gallery/detail'])
            ?>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Sed cursus ante</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>4786</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>113</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element fashion">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <?=
            Html::a('<img src="http://localhost/yii2-start-d2/images/post/540x368/test4.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>', ['gallery/detail'])
            ?>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Nulla quis sem at</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>5558</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>77</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element nature">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <?=
            Html::a('<img src="http://localhost/yii2-start-d2/images/post/540x368/test5.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>', ['gallery/detail'])
            ?>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Duis sagittis ipsum</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>2692</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>26</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element portrait">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <?=
            Html::a('<img src="http://localhost/yii2-start-d2/images/post/540x368/test6.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>', ['gallery/detail'])
            ?>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Praesent mauris</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>5262</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>40</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element advertisement">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <?=
            Html::a('<img src="http://localhost/yii2-start-d2/images/post/540x368/test7.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>', ['gallery/detail'])
            ?>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Fusce nec tellus</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>5858</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>41</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element fashion portrait">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <a href="simple_fullwidth_image_post.html">
                <img src="img/portfolio/grid/8.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
            </a>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Class aptent taciti</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>2411</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>23</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element stuff">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <a href="simple_fullwidth_image_post.html">
                <img src="img/portfolio/grid/9.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
            </a>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Sed dignissim nunc</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>2684</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>31</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element nature">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <a href="simple_fullwidth_image_post.html">
                <img src="img/portfolio/grid/10.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
            </a>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Class aptent taciti</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>2228</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>25</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element fashion portrait">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <a href="simple_fullwidth_image_post.html" >
                <img src="img/portfolio/grid/11.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
            </a>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Nunc feugiat mi</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>1283</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>25</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element stuff">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <a href="simple_fullwidth_image_post.html" >
                <img src="img/portfolio/grid/12.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
            </a>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Integer euismod lacus</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>1110</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>23</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element nature">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <a href="simple_fullwidth_image_post.html">
                <img src="img/portfolio/grid/13.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
            </a>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Vestibulum ante</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>1442</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>15</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element cities stuff">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <a href="simple_fullwidth_image_post.html">
                <img src="img/portfolio/grid/14.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
            </a>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Donec lacus nunc</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>2206</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>16</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blogpost_preview_fw element advertisement">

    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <a href="simple_fullwidth_image_post.html">
                <img src="img/portfolio/grid/15.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
            </a>
        </div>
        <div class="grid-port-cont">
            <h6><a href="simple_fullwidth_image_post.html">Integer lacinia massa</a></h6>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>1945</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>29</span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<a href="javascript:void(0)" class="load_more_works"><i class="icon-arrow-down"></i>Load more works</a>
</div>
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
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/modules.js"></script>
<script type="text/javascript" src="js/theme.js"></script>
<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="js/sorting.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($){
        "use strict";
        setTimeout(function(){
            jQuery('.fullscreen_block').removeClass('hided');
        },2500);
        setTimeout("jQuery('.preloader').remove()", 2700);
    });
</script>
</body>
</html>