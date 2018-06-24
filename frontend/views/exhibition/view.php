<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 18.12.2015
 * Time: 17:13
 */

use yii\helpers\Html;
use frontend\widgets\ExhibitionView;
?>
<div class="fullscreen-gallery hided">
    <div class="fs_grid_gallery">
        <div class="ribbon_wrapper">
            <a href="javascript:void(0)" class="btn_prev"></a>
            <a href="javascript:void(0)" class="btn_next"></a>
            <div id="ribbon_swipe"></div>
            <div class="ribbon_list_wrapper">
                <?= ExhibitionView::widget([
                    'model' => $model,
                ]) ?>
            </div>
        </div>
        <div class="slider_info">
            <div class="slider_data">
                <a href="javascript:void(0)" class="ltl_prev"><i class="icon-angle-left"></i></a><span class="num_current">1</span> of <span class="num_all"></span><a href="javascript:void(0)" class="ltl_next"><i class="icon-angle-right"></i></a>
                <h6 class="slider_title">Ribbon</h6><h6 class="slider_caption"></h6>
            </div>
            <div class="slider_share">
                <div class="blogpost_share">
                    <span>Share this:</span>
                    <a href="javascript:void(0)" class="share_facebook"><i class="stand_icon icon-facebook-square"></i></a>
                    <a href="javascript:void(0)" class="share_pinterest"><i class="stand_icon icon-pinterest"></i></a>
                    <a href="javascript:void(0)" class="share_tweet"><i class="stand_icon icon-twitter"></i></a>
                    <a href="javascript:void(0)" class="share_gplus"><i class="icon-google-plus-square"></i></a>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="block_likes">
                <div class="post-views"><i class="stand_icon icon-eye"></i> <span>3977</span></div>
                <div class="gallery_likes gallery_likes_add">
                    <i class="stand_icon icon-heart-o"></i>
                    <span>32</span>
                </div>
            </div>
        </div>
        <!-- .fullscreen_content_wrapper -->
    </div>
</div>