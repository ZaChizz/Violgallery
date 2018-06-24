<?php

namespace backend\controllers;

use Yii;
use backend\models\MultipleUploadForm;
use yii\web\UploadedFile;
use backend\models\StaticPage;
use backend\models\StaticPageImage;
use backend\models\StaticPageImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use Imagine\Image\Point;

/**
 * StaticPageImageController implements the CRUD actions for StaticPageImage model.
 */
class StaticPageImageController extends Controller
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
     * Lists all StaticPageImage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StaticPageImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StaticPageImage model.
     * @param integer $id
     * @return mixed
     */
    public function actionBackground($id)
    {
        if (($model = StaticPageImage::findOne($id))== null) {
            throw new NotFoundHttpException();
        }


        $form = new MultipleUploadForm();

        $form->title = 'Background';

        if (Yii::$app->request->isPost) {
            $form->load(Yii::$app->request->post());
            $form->files = UploadedFile::getInstances($form, 'files');
            if ($form->files && $form->validate()) {
                foreach ($form->files as $file) {
                    $file->saveAs($model->getPath());
                    $model->resolution = $this->getResolution($model->getHash());
                    $model->orientation = $this->getOrientation($model->getHash());
                    $this->cropBg($model->getHash(),$model);
                    $this->rename($model);
                }
                return $this->redirect(['static-page/update', 'id' => $id]);
            }
        }

        if ($model->load(Yii::$app->request->post())) {
            return $this->redirect(['static-page/update', 'id' => $id]);
        } else {
            return $this->render('update', [
                'model' => $model,'uploadForm' => $form,
            ]);
        }
    }

    /**
     * Creates a new StaticPageImage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StaticPageImage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StaticPageImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        if (($model = StaticPageImage::findOne($id))== null) {
            throw new NotFoundHttpException();
        }

        $form = new MultipleUploadForm();
        $form->title= $model->title;

        if (Yii::$app->request->isPost) {
            $form->load(Yii::$app->request->post());
            $form->files = UploadedFile::getInstances($form, 'files');
            if ($form->files && $form->validate()) {
                foreach ($form->files as $file) {
                    $model->title = $form->title;
                    if ($model->save()) {
                        $file->saveAs($model->getPath());
                    }
                    $model->resolution = $this->getResolution($model->getHash());
                    $model->orientation = $this->getOrientation($model->getHash());
                    $this->crop($model->getHash(),$model);
                   // $this->renameCover($model);
                }
                return $this->redirect(['static-page/update', 'id' => $model->id]);
            }

        }


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['static-page/update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,'uploadForm' => $form,
            ]);
        }
    }

    /**
     * Deletes an existing StaticPageImage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the StaticPageImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StaticPageImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StaticPageImage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function crop($filename,$model)
    {

        /*460x*/
        $this->resizeWidth($filename,460,$model);
        /*END*/

    }

    protected function cropBg($filename,$model)
    {
        /*1920x1280*/
        $this->resize($filename,1920,1280,$model);
        /*END*/
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

    protected function resizeWidth($filename, $width, $model)
    {

        if ($model->orientation == 'album') {
            Image::resize(Yii::getAlias('@images/staticPage/orig/' . $filename . '.jpg'), $width, 0)
                ->save(Yii::getAlias('@images/staticPage/' . $width . 'x'. '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        } elseif ($model->orientation == 'portret') {

            Image::resize(Yii::getAlias('@images/staticPage/orig/' . $filename . '.jpg'), $width, 0)
                ->save(Yii::getAlias('@images/staticPage/' . $width . 'x' . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::box(Yii::getAlias('@images/staticPage/' .  $width . 'x' . '/' . $filename . '.jpg'), $width, 0)
                ->save(Yii::getAlias('@images/staticPage/' . $width . 'x' . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        }
    }

    protected function thumbnail($filename, $width, $height, $model)
    {
        if ($model->orientation == 'album') {
            Image::resize(Yii::getAlias('@images/staticPage/orig/' . $filename . '.jpg'), 0, $height)
                ->save(Yii::getAlias('@images/staticPage/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::thumbnail(Yii::getAlias('@images/staticPage/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
                ->save(Yii::getAlias('@images/staticPage/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        } elseif ($model->orientation == 'portret') {
            Image::resize(Yii::getAlias('@images/staticPage/orig/' . $filename . '.jpg'), $width, 0)
                ->save(Yii::getAlias('@images/staticPage/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::thumbnail(Yii::getAlias('@images/staticPage/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
                ->save(Yii::getAlias('@images/staticPage/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        }

        return false;
    }

    protected function resizePortret($filename, $width, $height)
    {
        Image::resize(Yii::getAlias('@images/staticPage/orig/' . $filename . '.jpg'), $width, 0)
            ->save(Yii::getAlias('@images/staticPage/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        Image::thumbnail(Yii::getAlias('@images/staticPage/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
            ->save(Yii::getAlias('@images/staticPage/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        return true;
    }

    protected function resizeAlbum($filename, $width, $height)
    {
        Image::resize(Yii::getAlias('@images/staticPage/orig/' . $filename . '.jpg'), 0, $height)
            ->save(Yii::getAlias('@images/staticPage/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        Image::thumbnail(Yii::getAlias('@images/staticPage/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
            ->save(Yii::getAlias('@images/staticPage/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        return true;
    }

    protected function getResolution($filename)
    {
        $size = Image::getResolution(Yii::getAlias('@images/staticPage/orig/' . $filename . '.jpg'));

        return json_encode($size);
    }

    protected function getOrientation($filename)
    {

        $size = Image::getResolution(Yii::getAlias('@images/staticPage/orig/' . $filename . '.jpg'));

        if (($size['width'] / $size['height']) >= 1)

            return 'album';

        else

            return 'portret';
    }

    protected function rename($model)   {

        if(rename(Yii::getAlias('@images/staticPage/1920x1280/' . $model->getHash() . '.jpg'),Yii::getAlias('@images/staticPage/1920x1280/bg'.$model->id . '.jpg')))
        {
            return true;
        }

        else
            return false;


    }

}
