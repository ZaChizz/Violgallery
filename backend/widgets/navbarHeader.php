<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 28.05.2015
 * Time: 13:06
 */

namespace backend\widgets;


class NavbarHeader extends \yii\bootstrap\Widget
{
    public $model;

    protected $tags = array();

    public function init(){
        parent::init();


    }

    public function run(){

        return $this->render('NavbarHeader/index');

    }
}
?>