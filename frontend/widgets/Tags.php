<?php

namespace frontend\widgets;

use frontend\models\Tag;

class Tags extends \yii\bootstrap\Widget
{
    public $maket;
    public $limit = 10;
    protected $model;

    public function init(){
        parent::init();

        $this->model = Tag::find()->where(['frequency' => 1])->limit($this->limit)->all();

    }

    public function run(){
        switch($this->maket){
            case "main": return $this->render('Tags/index', [
                'model' => $this->model,
            ]);
            case "footer": return $this->render('Tags/footer', [
                'model' => $this->model,
            ]);
            default: return $this->render('Tags/index', [
                'model' => $this->model,
            ]);
        }
    }
}
?>
