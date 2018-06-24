<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use frontend\widgets\Tags;
use frontend\widgets\RecentPost;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

        <div class="row">
            <div class="col-md-4">
                <?= Tags::widget([
                    'maket' => 'main',
                    'limit' => 10
                ]) ?>
                <?= RecentPost::widget([
                    'maket' => 'main',
                    'limit' => 3
                ]) ?>
            </div>
            <div class="col-md-8"><?= $content ?></div>
        </div>



        </div>
    </div>

    <footer id="footer" class="style4">
        <div class="callout-box style2">
            <div class="container">
                <div class="callout-content">
                    <div class="callout-text">
                        <h4>Miracle is premium hand-crafted, pixel perfect and responsive wordpress theme</h4>
                    </div>
                    <div class="callout-action">
                        <a href="#" class="btn style4">Purchase</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrapper">
            <div class="container">
                <div class="row add-clearfix same-height">
                    <div class="col-sm-6 col-md-3">
                        <?= RecentPost::widget([
                            'maket' => 'footer',
                            'limit' => 3
                        ]) ?>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <?= Tags::widget([
                            'maket' => 'footer',
                            'limit' => 20
                        ]) ?>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <h5 class="section-title box">Useful Links</h5>
                        <ul class="arrow useful-links">
                            <li><a href="#">About SoapTheme</a></li>
                            <li><a href="#">Video Overview</a></li>
                            <li><a href="#">Customer Support</a></li>
                            <li><a href="#">Theme Features</a></li>
                            <li><a href="#">Breaking News</a></li>
                            <li><a href="#">Upcoming Updates</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <h5 class="section-title box">About Miracle</h5>
                        <p>Mircale is a Hand Crafted Pexil Perfect - Responsive - Multi-Purpose & Retina Ready Premium Wordpress Theme which sets new standards for the web design in 2014.</p>
                        <div class="social-icons">
                            <a href="#" class="social-icon"><i class="fa fa-twitter has-circle" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a>
                            <a href="#" class="social-icon"><i class="fa fa-facebook has-circle" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a>
                            <a href="#" class="social-icon"><i class="fa fa-google-plus has-circle" data-toggle="tooltip" data-placement="top" title="GooglePlus"></i></a>
                            <a href="#" class="social-icon"><i class="fa fa-linkedin has-circle" data-toggle="tooltip" data-placement="top" title="LinkedIn"></i></a>
                            <a href="#" class="social-icon"><i class="fa fa-skype has-circle" data-toggle="tooltip" data-placement="top" title="Skype"></i></a>
                            <a href="#" class="social-icon"><i class="fa fa-dribbble has-circle" data-toggle="tooltip" data-placement="top" title="Dribbble"></i></a>
                            <a href="#" class="social-icon"><i class="fa fa-tumblr has-circle" data-toggle="tooltip" data-placement="top" title="Tumblr"></i></a>
                        </div>
                        <a href="#" class="btn btn-sm style4">Contact Us</a>
                        <a href="#" class="btn btn-sm style4">Purchase</a>
                        <a href="#" class="back-to-top"><span></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="copyright-area">
                    <nav class="secondary-menu">
                        <ul class="nav nav-pills">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li><a href="#">Shortcodes</a></li>
                            <li><a href="#">Portfolio</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        &copy; 2014 Miracle <em>by</em> <a href="http://www.soaptheme.net/">SoapTheme</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
