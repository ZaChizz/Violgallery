<?php

namespace backend\controllers;

use Yii;
use backend\models\MultipleUploadForm;
use backend\models\Post;
use backend\models\PostImage;
use backend\models\PostImageSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\imagine\Image;
use Imagine\Image\Point;

/**
 * PostImageController implements the CRUD actions for PostImage model.
 */
class PostImageController extends Controller
{

    public  $layout = 'SBAdmin2';

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


    public function actionIndex($id)
    {

        if (!Post::find()->where(['id' => $id])->exists()) {
            throw new NotFoundHttpException();
        }

        $form = new MultipleUploadForm();

        $searchModel = new PostImageSearch();
        $searchModel->id_post = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->isPost) {
            $form->load(Yii::$app->request->post());
            $form->files = UploadedFile::getInstances($form, 'files');
            if ($form->files && $form->validate()) {
                foreach ($form->files as $file) {
                    $image = new postImage();
                    $image->id_post = $id;
                    $image->title = $form->title;
                    if ($image->save()) {
                        $file->saveAs($image->getPath());
                    }
                    $image->resolution = $this->getResolution($image->getHash());
                    $image->orientation = $this->getOrientation($image->getHash());
                    $this->crop($image->getHash(),$image);
                    $image->save();
                }
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'uploadForm' => $form,
        ]);
    }

    /**
     * Displays a single PostImage model.
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
     * Updates an existing PostImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index','id'=>$model->post->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PostImage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['index','id'=>$model->post->id]);
    }

    public function actionMerge()
    {
        $models = $this->findModels();
        foreach($models as $model)
        {
            echo $model->id.' _ ';
            $this->copyImage($model);
        }
    }

    public function actionCrop()
    {
        $models = $this->findModels();
        foreach($models as $model)
        {
            echo $model->id.' _ ';
            $model->resolution = $this->getResolution($model->getHash());
            $model->orientation = $this->getOrientation($model->getHash());
            $model->save();
            $this->crop($model->getHash(),$model);
        }

    }

    protected function copyImage($model)
    {
        $filename = Yii::getAlias('@images/post/orig/' . $model->src);
        $fileSave = Yii::getAlias('@images/post/orig/' . $model->getHash().'.jpg');
        $img = Image::getImagine()->open(Yii::getAlias($filename));
        $img->save($fileSave);
    }

    protected function findModels()
    {
        return postImage::find()->all();
    }

    /**
     * Finds the PostImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PostImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PostImage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function crop($filename,$model)
    {

        /*96x96*/
        $this->thumbnail($filename,96,96,$model);
        /*END*/

        /*1170*/
        $this->resize($filename,1170,563,$model);
        /*END*/

    }

    protected function resizeBig($filename, $width, $model)
    {
        if ($model->orientation == 'album') {
            Image::resize(Yii::getAlias('@images/post/orig/' . $filename . '.jpg'), $width, 0)
                ->save(Yii::getAlias('@images/post/' . $width . 'x/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        } elseif ($model->orientation == 'portret') {

            Image::resize(Yii::getAlias('@images/post/orig/' . $filename . '.jpg'), 0, $width)
                ->save(Yii::getAlias('@images/post/' . $width . 'x/' . $filename . '.jpg'), ['quality' => 80]);

            Image::boxing(Yii::getAlias('@images/post/' . $width . 'x/' . $filename . '.jpg'), $width, $width)
                ->save(Yii::getAlias('@images/post/' . $width . 'x/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        }
    }

    protected function thumbnail($filename, $width, $height, $model)
    {
        if ($model->orientation == 'album') {
            Image::resize(Yii::getAlias('@images/post/orig/' . $filename . '.jpg'), 0, $height)
                ->save(Yii::getAlias('@images/post/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::thumbnail(Yii::getAlias('@images/post/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
                ->save(Yii::getAlias('@images/post/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        } elseif ($model->orientation == 'portret') {
            Image::resize(Yii::getAlias('@images/post/orig/' . $filename . '.jpg'), $width, 0)
                ->save(Yii::getAlias('@images/post/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::thumbnail(Yii::getAlias('@images/post/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
                ->save(Yii::getAlias('@images/post/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        }

        return false;
    }

    protected function mansory($filename, $width)
    {
        Image::resize(Yii::getAlias('@images/post/orig/' . $filename . '.jpg'), $width, 0)
            ->save(Yii::getAlias('@images/post/' . $width . 'x/' . $filename . '.jpg'), ['quality' => 80]);
    }


    protected function resizePortret($filename, $width, $height)
    {
        Image::resize(Yii::getAlias('@images/product/orig/' . $filename . '.jpg'), $width, 0)
            ->save(Yii::getAlias('@images/product/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        Image::thumbnail(Yii::getAlias('@images/product/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
            ->save(Yii::getAlias('@images/product/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        return true;
    }

    protected function resizeAlbum($filename, $width, $height)
    {
        Image::resize(Yii::getAlias('@images/product/orig/' . $filename . '.jpg'), 0, $height)
            ->save(Yii::getAlias('@images/product/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        Image::thumbnail(Yii::getAlias('@images/product/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
            ->save(Yii::getAlias('@images/product/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        return true;
    }

    protected function resize($filename, $width, $height, $model)
    {
        if ($model->orientation == 'album') {
            Image::resize(Yii::getAlias('@images/post/orig/' . $filename . '.jpg'), 0, $height)
                ->save(Yii::getAlias('@images/post/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::thumbnail(Yii::getAlias('@images/post/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
                ->save(Yii::getAlias('@images/post/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        } elseif ($model->orientation == 'portret') {
            Image::resize(Yii::getAlias('@images/post/orig/' . $filename . '.jpg'), $width, 0)
                ->save(Yii::getAlias('@images/post/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::thumbnail(Yii::getAlias('@images/post/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
                ->save(Yii::getAlias('@images/post/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        }

        return false;

    }

    protected function getResolution($filename)
    {
        $size = Image::getResolution(Yii::getAlias('@images/post/orig/' . $filename . '.jpg'));

        return json_encode($size);
    }

    protected function getOrientation($filename)
    {

        $size = Image::getResolution(Yii::getAlias('@images/post/orig/' . $filename . '.jpg'));

        if (($size['width'] / $size['height']) >= 1)

            return 'album';

        else

            return 'portret';
    }
}
