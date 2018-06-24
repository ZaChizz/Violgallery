<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 22.12.2015
 * Time: 15:49
 */

namespace frontend\widgets;


use frontend\models\ExhibitionImage;

class ExhibitionView extends \yii\bootstrap\Widget
{
    public $model;

    protected $EI;

    protected $item = array();

    public function init(){
        parent::init();

        if(isset($this->model->exhibitionImages))
        {
            $this->item = $this->model->exhibitionImages;
        }
        else
        {
            $this->EI =  new ExhibitionImage();
            $this->item = $this->EI->Mokeup($this->model->id);
        }


    }

    public function run(){

        return $this->render('ExhibitionView/index', [
            'model' => $this->item,
        ]);

    }
}
?>