<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class GalleryController extends Controller
{
    public $layout = 'oyster_gallery';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionArtists()
    {
        $this->layout = 'oyster_artist';
        return $this->render('index');
    }

    public function actionCategories()
    {
        $this->layout = 'oyster_category';
        return $this->render('index');
    }

    public function actionDetail()
    {
        $this->layout = 'oyster_detail';
        return $this->render('index');
    }

}
