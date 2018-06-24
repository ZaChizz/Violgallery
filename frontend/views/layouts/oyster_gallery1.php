<?php

use yii\helpers\Html;
use frontend\widgets\Menu;
use yii\widgets\Breadcrumbs;
use frontend\widgets\Tags;
use frontend\widgets\RecentPost;
use yii\web\Controller;
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
    <link rel="stylesheet" href="css/theme.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/responsive.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/custom.css" type="text/css" media="all" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="main_header">
    <div class="header_wrapper">
        <div class="logo_sect">
            <a href="index.php" class="logo"><img src="img/logo.png" alt=""  class="logo_def"><img src="img/retina/logo.png" alt="" class="logo_retina"></a>
            <div class="slogan">html photo template</div>
        </div>
        <div class="header_rp">
            <nav>
                <div class="menu-main-menu-container">
                    <ul id="menu-main-menu" class="menu">
                        <li class="menu-item-has-children">
                            <a href="#"><span>Home</span></a>
                            <ul class="sub-menu">
                                <li><a href="index.html"><span>Slider</span></a></li>
                                <li><a href="portfolio_masonry.html"><span>Masonry Portfolio</span></a></li>
                                <li><a href="horizontal_striped.html"><span>Horizontal Striped</span></a></li>
                                <li><a href="vertical_striped.html"><span>Vertical Striped</span></a></li>
                                <li><a href="revolution_slider.html"><span>Revolution Slider</span></a></li>
                                <li><a href="bg_image.html"><span>Image BG</span></a></li>
                                <li><a href="bg_video.html"><span>Vimeo BG</span></a></li>
                                <li><a href="bg_youtube_video.html"><span>Youtube BG</span></a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#"><span>Gallery</span></a>
                            <ul class="sub-menu">
                                <li><a href="gallery_kenburns.html"><span>Kenburns</span></a></li>
                                <li><a href="gallery_flow.html"><span>Flow</span></a></li>
                                <li><a href="gallery_ribbon.html"><span>Ribbon</span></a></li>
                                <li><a href="gallery_photo_listing.html"><span>Photo Listing</span></a></li>
                                <li><a href="gallery_grid.html"><span>Grid</span></a></li>
                                <li><a href="gallery_grid_with_margin.html"><span>Grid 2</span></a></li>
                                <li><a href="gallery_masonry.html"><span>Masonry</span></a></li>
                                <li><a href="gallery_masonry_with_margin.html"><span>Masonry 2</span></a></li>
                            </ul>
                        </li>
                        <li class="current-menu-parent menu-item-has-children">
                            <a href="#"><span>Portfolio</span></a>
                            <ul class="sub-menu">
                                <li><a href="portfolio_grid1.html"><span>Grid Style 1</span></a></li>
                                <li><a href="portfolio_grid2.html"><span>Grid Style 2</span></a></li>
                                <li><a href="portfolio_masonry_listing.html"><span>Masonry Style</span></a></li>
                                <li class="current-menu-item"><a href="portfolio_standard.html"><span>Isotope</span></a></li>
                                <li class="menu-item-has-children">
                                    <a href="#"><span>Columns</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="portfolio_1col.html"><span>1 Column</span></a></li>
                                        <li><a href="portfolio_2col.html"><span>2 Columns</span></a></li>
                                        <li><a href="portfolio_3col.html"><span>3 Columns</span></a></li>
                                        <li><a href="portfolio_4col.html"><span>4 Columns</span></a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#"><span>Fullscreen Posts</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="fullscreen_ribbon_post.html"><span>Ribbon</span></a></li>
                                        <li><a href="fullscreen_post_without_info.html"><span>Without Info</span></a></li>
                                        <li><a href="fullscreen_post_with_info.html"><span>With Info</span></a></li>
                                        <li><a href="fullscreen_video_post_without_info.html"><span>Video Post</span></a></li>
                                        <li><a href="fullscreen_post_sidebar.html"><span>With Sidebar</span></a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#"><span>Simple Posts</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="simple_fullwidth_image_post.html"><span>Image</span></a></li>
                                        <li><a href="video_post_with_gallery.html"><span>Video</span></a></li>
                                        <li><a href="simple_image_post.html"><span>With Sidebar</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#"><span>Blog</span></a>
                            <ul class="sub-menu">
                                <li><a href="fullscreen_blog.html"><span>Fullscreen</span></a></li>
                                <li class="menu-item-has-children">
                                    <a href="#"><span>Standard</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="blog_with_right_sidebar.html"><span>Right Sidebar</span></a></li>
                                        <li><a href="blog_with_left_sidebar.html"><span>Left Sidebar</span></a></li>
                                        <li><a href="fullwidth_blog.html"><span>Fullwidth</span></a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#"><span>Posts Variants</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="fullwidth_image_post.html"><span>Fullwidth Post</span></a></li>
                                        <li><a href="vimeo_video_post.html"><span>Right Sidebar</span></a></li>
                                        <li><a href="post_with_left_sidebar.html"><span>Left Sidebar</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#"><span>Pages</span></a>
                            <ul class="sub-menu">
                                <li><a href="about.html"><span>About</span></a></li>
                                <li><a href="full_width.html"><span>Full Width</span></a></li>
                                <li><a href="before_after.html"><span>Before/After</span></a></li>
                                <li><a href="coming_soon.html"><span>Coming Soon</span></a></li>
                                <li><a href="404.html"><span>404 Error</span></a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#"><span>Features</span></a>
                            <ul class="sub-menu">
                                <li><a href="shortcodes.html"><span>Shortcodes</span></a></li>
                                <li><a href="typography.html"><span>Typography</span></a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#"><span>Contact</span></a>
                            <ul class="sub-menu">
                                <li><a href="contacts_fullscreen.html"><span>Fullscreen</span></a></li>
                                <li><a href="contact_with_sidebar.html"><span>With Sidebar</span></a></li>
                                <li><a href="contact_fullwidth.html"><span>Fullwidth</span></a></li>
                            </ul>
                        </li>
                    </ul>
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
    <li class="selected"><a href="#filter" data-option-value="*">All Works</a></li>
    <li><a data-option-value=".advertisement" href="#filter" title="View all post filed under advertisement">Advertisement</a></li>
    <li><a data-option-value=".cities" href="#filter" title="View all post filed under cities">Cities</a></li>
    <li><a data-option-value=".fashion" href="#filter" title="View all post filed under fashion">Fashion</a></li>
    <li><a data-option-value=".nature" href="#filter" title="View all post filed under nature">Nature</a></li>
    <li><a data-option-value=".portrait" href="#filter" title="View all post filed under portrait">Portrait</a></li>
    <li><a data-option-value=".stuff" href="#filter" title="View all post filed under stuff">Stuff</a></li>
</ul>
<div class="fs_blog_module image-grid">
<div class="blogpost_preview_fw element stuff">
    <div class="fw_preview_wrapper">
        <div class="gallery_item_wrapper">
            <?= Html::a('<img src="http://localhost/yii2-start-d2/images/post/540x368/test7.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>', ['gallery/detail'])
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

                <?= Html::a('<img src="http://localhost/yii2-start-d2/images/post/780x390/test2.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>',['gallery/detail']) ?>

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

                <?= Html::a('<img src="http://localhost/yii2-start-d2/images/post/540x368/test1.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>',['gallery/detail']) ?>


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

                <?= Html::a('<img src="http://localhost/yii2-start-d2/images/post/540x368/test3.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>',['gallery/detail']) ?>


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

                <?= Html::a('<img src="http://localhost/yii2-start-d2/images/post/540x368/test6.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>',['gallery/detail']) ?>


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

                <?= Html::a('<img src="http://localhost/yii2-start-d2/images/post/540x368/test4.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>',['gallery/detail']) ?>


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

                <?= Html::a('<img src="http://localhost/yii2-start-d2/images/post/540x368/test5.jpg" alt="" class="fw_featured_image" width="540">
                <div class="gallery_fadder"></div>
                <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>',['gallery/detail']) ?>


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
                <img src="img/portfolio/masonry/8.jpg" alt="" class="fw_featured_image" width="540">
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
                <img src="img/portfolio/masonry/9.jpg" alt="" class="fw_featured_image" width="540">
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
                <img src="img/portfolio/masonry/10.jpg" alt="" class="fw_featured_image" width="540">
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
                <img src="img/portfolio/masonry/11.jpg" alt="" class="fw_featured_image" width="540">
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
                <img src="img/portfolio/masonry/12.jpg" alt="" class="fw_featured_image" width="540">
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
                <img src="img/portfolio/masonry/13.jpg" alt="" class="fw_featured_image" width="540">
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
                <img src="img/portfolio/masonry/14.jpg" alt="" class="fw_featured_image" width="540">
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
                <img src="img/portfolio/masonry/15.jpg" alt="" class="fw_featured_image" width="540">
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
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>