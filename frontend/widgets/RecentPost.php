<?php

namespace frontend\widgets;

use frontend\models\post;

class RecentPost extends \yii\bootstrap\Widget
{
    public $maket;
    public $limit;
    protected $model;

    public function init(){
        parent::init();

        $this->model = Post::find()->where(['status' => 2])->limit($this->limit)->all();

    }

    public function run(){
        switch($this->maket){
            case "main": return $this->render('RecentPost/index', [
                'model' => $this->model,
            ]);
            case "footer": return $this->render('RecentPost/footer', [
                'model' => $this->model,
            ]);
            default: return $this->render('RecentPost/index', [
                'model' => $this->model,
            ]);
        }
    }
}
?>
