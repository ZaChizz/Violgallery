<?php

namespace backend\controllers;

use Yii;
use backend\models\MultipleUploadForm;
use yii\web\UploadedFile;
use backend\models\ExhibitionImage;
use backend\models\ExhibitionImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use Imagine\Image\Point;

/**
 * ExhibitionImageController implements the CRUD actions for ExhibitionImage model.
 */
class ExhibitionImageController extends Controller
{

    public  $layout = 'SBAdmin2';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ExhibitionImage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExhibitionImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ExhibitionImage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ExhibitionImage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new ExhibitionImage();
        $model->home = 0;

        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }


        if (($model = ExhibitionImage::findOne($id))== null) {
            throw new NotFoundHttpException();
        }
        */
        $form = new MultipleUploadForm();
        $form->title= $model->title;

        if (Yii::$app->request->isPost) {
            $form->load(Yii::$app->request->post());
            $form->files = UploadedFile::getInstances($form, 'files');
            if ($form->files && $form->validate()) {
                foreach ($form->files as $file) {
                    $model->title = $form->title;
                    $model->exhibition_id = $id;
                    if ($model->save()) {
                        $file->saveAs($model->getPath());
                    }
                    $model->resolution = $this->getResolution($model->getHash());
                    $model->orientation = $this->getOrientation($model->getHash());

                    $this->crop($model->getHash(),$model);
                    if($model->save())
                        return $this->redirect(['exhibition/update','id'=>$model->exhibition_id]);
                    else
                        return $this->redirect(['exhibition/index','id'=>$model->exhibition_id]);
                }

            }
        }

        return $this->render('create', [
            'uploadForm' => $form,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ExhibitionImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ExhibitionImage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $exhibition_id = $this->findModel($id)->exhibition_id;


        $this->findModel($id)->delete();

        return $this->redirect(['exhibition/update','id'=>$exhibition_id]);
    }

    /**
     * Finds the ExhibitionImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ExhibitionImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ExhibitionImage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function crop($filename,$model)
    {
        /*570x430*/
        $this->resizeHeight($filename,910,$model);
        /*END*/


        /*96x96*/
        $this->thumbnail($filename,96,96,$model);
        /*END*/


    }

    protected function resizeHeight($filename, $height, $model)
    {

        if ($model->orientation == 'album') {
            Image::resize(Yii::getAlias('@images/exhibition/orig/' . $filename . '.jpg'), 0, $height)
                ->save(Yii::getAlias('@images/exhibition/' . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        } elseif ($model->orientation == 'portret') {

            Image::resize(Yii::getAlias('@images/exhibition/orig/' . $filename . '.jpg'), 0, $height)
                ->save(Yii::getAlias('@images/exhibition/' . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::boxing(Yii::getAlias('@images/exhibition/' . 'x' . $height . '/' . $filename . '.jpg'), $height, $height)
                ->save(Yii::getAlias('@images/exhibition/' . 'x' .$height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        }
    }

    protected function thumbnail($filename, $width, $height, $model)
    {
        if ($model->orientation == 'album') {
            Image::resize(Yii::getAlias('@images/exhibition/orig/' . $filename . '.jpg'), 0, $height)
                ->save(Yii::getAlias('@images/exhibition/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::thumbnail(Yii::getAlias('@images/exhibition/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
                ->save(Yii::getAlias('@images/exhibition/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        } elseif ($model->orientation == 'portret') {
            Image::resize(Yii::getAlias('@images/exhibition/orig/' . $filename . '.jpg'), $width, 0)
                ->save(Yii::getAlias('@images/exhibition/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::thumbnail(Yii::getAlias('@images/exhibition/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
                ->save(Yii::getAlias('@images/exhibition/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        }

        return false;
    }

    protected function resize($filename, $width, $height, $model)
    {
        $size = json_decode($model->resolution,true);
        $q = $width/$height;
        $model_q = $size['width']/$size['height'];

        if($model_q>$q)
        {
            $this->resizeAlbum($filename, $width, $height);
        }
        else
        {
            $this->resizePortret($filename, $width, $height);
        }

    }


    protected function resizePortret($filename, $width, $height)
    {
        Image::resize(Yii::getAlias('@images/exhibition/orig/' . $filename . '.jpg'), $width, 0)
            ->save(Yii::getAlias('@images/exhibition/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        Image::thumbnail(Yii::getAlias('@images/exhibition/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
            ->save(Yii::getAlias('@images/exhibition/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        return true;
    }

    protected function resizeAlbum($filename, $width, $height)
    {
        Image::resize(Yii::getAlias('@images/exhibition/orig/' . $filename . '.jpg'), 0, $height)
            ->save(Yii::getAlias('@images/exhibition/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        Image::thumbnail(Yii::getAlias('@images/exhibition/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
            ->save(Yii::getAlias('@images/exhibition/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        return true;
    }

    protected function copyImage($model)
    {
        $filename = Yii::getAlias('@images/exhibition/orig/' . $model->product->image);
        $fileSave = Yii::getAlias('@images/exhibition/orig/' . $model->getHash().'.jpg');
        $img = Image::getImagine()->open(Yii::getAlias($filename));
        $img->save($fileSave);
    }

    protected function getResolution($filename)
    {
        $size = Image::getResolution(Yii::getAlias('@images/exhibition/orig/' . $filename . '.jpg'));

        return json_encode($size);
    }

    protected function getOrientation($filename)
    {

        $size = Image::getResolution(Yii::getAlias('@images/exhibition/orig/' . $filename . '.jpg'));

        if (($size['width'] / $size['height']) >= 1)

            return 'album';

        else

            return 'portret';
    }
}
