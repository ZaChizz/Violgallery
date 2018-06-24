<?php

namespace frontend\widgets;


class PostTags extends \yii\bootstrap\Widget
{
    public $model;

    protected $tags = array();

    public function init(){
        parent::init();

        $this->tags = explode ( ',', $this->model->tags);

    }

    public function run(){

        return $this->render('PostTags/index', [
                'tags' => $this->tags,
            ]);

    }
}
?>
