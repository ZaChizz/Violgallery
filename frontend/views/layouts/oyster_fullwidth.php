<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 15.05.2015
 * Time: 18:32
 */

use yii\helpers\Html;
use frontend\widgets\Menu;
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


    <div class="main_wrapper">
    	<div class="content_wrapper">
            <div class="container">
                <div class="content_block row no-sidebar">
                    <div class="fl-container ">
                        <div class="row">
                            <div class="posts-block ">
                                <?=$content ?>
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
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/modules.js"></script>
	<script type="text/javascript" src="js/theme.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCqo-F2TnMAABZvfV5yTQLlWvUCJlJViU&amp;sensor=false"></script>
    <script type="text/javascript">
		function initialize() {
            "use strict";
            // Create an array of styles.
            var styles = [
			  {
                  "stylers": [
				  { "saturation": -81 },
				  { "hue": "#00e5ff" }
				]
			  },{
                "elementType": "labels.text.stroke",
				"stylers": [
				  { "visibility": "off" }
				]
			  }
			];

            // Create a new StyledMapType object, passing it the array of styles,
            // as well as the name to be displayed on the map type control.
            var styledMap = new google.maps.StyledMapType(styles,
                {name: "Styled Map"});

            // Create a map object, and include the MapTypeId to add
            // to the map type control.
            var mapOptions = {
                zoom: 13,
                center: new google.maps.LatLng( ﻿40.7484333,-73.9856556),
                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                }
            };
            var map = new google.maps.Map(document.getElementById('map-canvas'),
                    mapOptions);

            //Associate the styled map with the MapTypeId and set it to display.
            map.mapTypes.set('map_style', styledMap);
            map.setMapTypeId('map_style');
        }
    	google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>