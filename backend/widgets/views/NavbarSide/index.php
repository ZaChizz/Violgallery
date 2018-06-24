<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 28.05.2015
 * Time: 13:23
 */

use yii\helpers\Html;
?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <?= Html::a('<i class="fa fa-dashboard fa-fw"></i> Dashboard',['site/index']); ?>
            </li>
            <li>
                <?= Html::a('<i class="fa fa-home fa-fw"></i> Home',['site/home']); ?>
            </li>
            <li>
                <a href="#"><i class="fa fa-rss fa-fw"></i>News<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?= Html::a('<i class="fa fa-plus fa-fw"></i> New',['post/create']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-table fa-fw"></i> Grid',['post/index']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-comments-o fa-fw"></i> Comments',['comment/index']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-heart fa-fw"></i> Likes',['comment/index']); ?>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-camera-retro fa-fw"></i> Products<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?= Html::a('<i class="fa fa-plus fa-fw"></i> New',['product/create']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-table fa-fw"></i> Grid',['product/index']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-th-list fa-fw"></i> List Prices',['prices/index']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-comments-o fa-fw"></i> Comments',['comment-product/index']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-heart-o fa-fw"></i> Likes',['comment-product/index']); ?>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-folder-open fa-fw"></i> Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?= Html::a('<i class="fa fa-plus fa-fw"></i> New',['category/create']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-table fa-fw"></i> Grid',['category/index']); ?>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-folder-open fa-fw"></i> Genre<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?= Html::a('<i class="fa fa-plus fa-fw"></i> New',['genre/create']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-table fa-fw"></i> Grid',['genre/index']); ?>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-folder-open fa-fw"></i> Style<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?= Html::a('<i class="fa fa-plus fa-fw"></i> New',['style/create']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-table fa-fw"></i> Grid',['style/index']); ?>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i> Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?= Html::a('<i class="fa fa-table fa-fw"></i> Grid',['user/index']); ?>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-qq fa-fw"></i> Artist<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?= Html::a('<i class="fa fa-plus fa-fw"></i> New',['artist/create']); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-table fa-fw"></i> Grid',['artist/index']); ?>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-dollar fa-fw"></i> Orders<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?= Html::a('<i class="fa fa-list fa-fw"></i> List',['order/index']); ?>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <?= Html::a('<i class="fa fa-camera fa-fw"></i> Exhibition',['exhibition/index']); ?>
            </li>
            <li>
                <a href="#"><i class="fa fa-group fa-fw"></i> Other Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <?= Html::a('<i class="fa fa-desktop fa-fw"></i> About us',['static-page/update','id'=>1]); ?>
                    </li>
                    <li>
                        <?= Html::a('<i class="fa fa-gears fa-fw"></i> Our Philosophy',['static-page/update','id'=>2]); ?>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>