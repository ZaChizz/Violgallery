<?php

namespace frontend\controllers;

use Yii;

use yii\web\Controller;
use yii\filters\VerbFilter;

class AjaxController extends Controller
{
    public $jsFile;
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function init() {
        parent::init();

        $this->jsFile = '@app/views/' . $this->id . '/ajax.js';

        // Publish and register the required JS file
        Yii::$app->assetManager->publish($this->jsFile);
        $this->getView()->registerJsFile(
            Yii::$app->assetManager->getPublishedUrl($this->jsFile),
            ['yii\web\YiiAsset'] // depends
        );
    }

    public function actionSimple() {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;


            $res = array(
                'body'    => date('Y-m-d H:i:s'),
                'success' => true,
            );

            return $res;
        }
    }
}