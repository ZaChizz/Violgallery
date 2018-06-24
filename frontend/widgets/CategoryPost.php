<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 21.05.2015
 * Time: 17:04
 */

namespace frontend\widgets;

use frontend\models\Category;
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
class CategoryPost extends \yii\bootstrap\Widget
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the bootstrap alert type (i.e. danger, success, info, warning)
     */
    protected $models;

    public function init()
    {
        parent::init();

    }

    public function run(){

        $this->models = Category::find()->asArray()->all();

        return $this->render('CategoryPost/index', [
            'models' => $this->models,
        ]);

    }

}
