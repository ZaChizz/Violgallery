<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\widgets;

use frontend\models\Category;
use frontend\models\Genre;
use frontend\models\Style;
use yii;

/**
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * \Yii::$app->getSession()->setFlash('error', 'This is the message');
 * \Yii::$app->getSession()->setFlash('success', 'This is the message');
 * \Yii::$app->getSession()->setFlash('info', 'This is the message');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * \Yii::$app->getSession()->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @author Alexander Makarov <sam@rmcreative.ru>
 */
class Menu extends \kartik\nav\NavX
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the bootstrap alert type (i.e. danger, success, info, warning)
     */
    protected $models = [];

    /**
     * @var array the options for rendering the close button tag.
     */
    public $closeButton = [];

    public function init()
    {
        parent::init();

        if (Yii::$app->user->isGuest) {
            $login = ['label' => 'Login', 'options' => ['class' => 'menu-item-has-children'], 'url' => ['site/login']];

        } else {
            $login  = [
                'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ];
        }

        if(Yii::$app->user->can('manage')){
            $admin = ['label' => 'Admin', 'options' => ['class' => 'menu-item-has-children'], 'url' => ['site/manage']];
        }
        else
            $admin = '';

        $this->options = ['class' => 'menu', 'id' => 'menu-main-menu'];
        $this->encodeLabels = false;
        $this->dropdownOptions = ['class' => 'sub-menu', 'options'=>['class'=>'sub-menu']];

        $this->items = [
            //    ['label' => 'Categories', 'option' => ['class' => 'menu-item-has-children'], 'url' => ['product/category'],
            //        'items' => $this->getItemsCategory()],
            //    ['label' => 'Genres', 'option' => ['class' => 'menu-item-has-children'], 'url' => ['product/genre'],
            //        'items' => $this->getItemsGenre()],
            //    ['label' => 'Styles', 'option' => ['class' => 'menu-item-has-children'], 'url' => ['product/style'],
            //        'items' => $this->getItemsStyle()],
                ['label' => 'Home', 'option' => ['class' => 'menu-item-has-children'], 'url' => ['site/home'],
                    'items' => [
                      ['label' => 'Home Sliders', 'option' => ['class' => 'menu-item-has-children'], 'url' => ['site/index']],
                      ['label' => 'Home Kenburns', 'option' => ['class' => 'menu-item-has-children'], 'url' => ['site/kenburns']],
                    ]],
                ['label' => 'About us', 'option' => ['class' => 'menu-item-has-children'], 'url' => ['site/about']],
                ['label' => 'Our philosophy', 'option' => ['class' => 'menu-item-has-children'], 'url' => ['site/philosophy']],
                ['label' => 'Exhibition', 'options' => ['class' => 'menu-item-has-children'], 'url' => ['exhibition/index']],
                ['label' => 'Artists', 'options' => ['class' => 'menu-item-has-children'], 'url' => ['product/artists']],
		['label' => 'Catalogue', 'options' => ['class' => 'menu-item-has-children'], 'url' => ['product/gallery']],
                ['label' => 'News', 'options' => ['class' => 'menu-item-has-children'], 'url' => ['post/index']],
                ['label' => 'Contact', 'options' => ['class' => 'menu-item-has-children'], 'url' => ['site/contact']],
                $admin,
                $login,

        ];
    }

    protected function getItemsCategory()
    {
        $this->models['Category'] = Category::find()->orderBy('title ASC')->asArray()->all();

        $itemsMenu = [];

        foreach($this->models['Category'] as $model)
        {
            $itemsMenu[] = ['label' => $model['title'], 'url' => ['product/category','category_id'=>$model['category_id']]];
        }

        return $itemsMenu;
    }

    protected function getItemsGenre()
    {
        $this->models['Genre'] = Genre::find()->orderBy('title ASC')->asArray()->all();

        $itemsMenu = [];

        foreach($this->models['Genre'] as $model)
        {
            $itemsMenu[] = ['label' => $model['title'], 'url' => ['product/genre','_id'=>$model['id']]];
        }

        return $itemsMenu;
    }

    protected function getItemsStyle()
    {
        $this->models['Style'] = Style::find()->orderBy('title ASC')->asArray()->all();

        $itemsMenu = [];

        foreach($this->models['Style'] as $model)
        {
            $itemsMenu[] = ['label' => $model['title'], 'url' => ['product/style','_id'=>$model['id']]];
        }

        return $itemsMenu;
    }

}
