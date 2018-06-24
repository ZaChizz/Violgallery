<?php

namespace backend\controllers;

use Yii;
use backend\models\MultipleUploadForm;
use backend\models\ProductImage;
use backend\models\Product;
use backend\models\ProductImageSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\imagine\Image;
use Imagine\Image\Point;

/**
 * ProductImageController implements the CRUD actions for productImage model.
 */
class ProductImageController extends Controller
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
        if (!Product::find()->where(['product_id' => $id])->exists()) {
            throw new NotFoundHttpException('Not found product');
        }

        $form = new MultipleUploadForm();

        $searchModel = new productImageSearch();
        $searchModel->product_id = $id;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->isPost) {
            $form->load(Yii::$app->request->post());
            $form->files = UploadedFile::getInstances($form, 'files');
            if ($form->files && $form->validate()) {
                foreach ($form->files as $file) {
                    $image = new productImage();
                    $image->product_id = $id;
                    $image->home = 0;
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
     * Displays a single productImage model.
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
     * Updates an existing productImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->home)
            {
                $product = $this->findProductModel($model->product->product_id);
                $product->home = 1;
                $product->save();
            }
            $this->redirect(['index', 'id' => $model->product->product_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing productImage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['index','id'=>$model->product->product_id]);
    }

    public function actionMerge()
    {
        $models = $this->findModels();
        foreach($models as $product)
        {
            echo $product->product_id.' _ ';
            $model = new productImage();
            $model->title = 'test';
            $model->product_id = $product->product_id;

            $model->resolution = $this->getResolution($product->image);
            $model->orientation = $this->getOrientation($product->image);
            $model->save();
            $this->copyImage($model);
        }
    }

    public function actionCrop()
    {
        $models = $this->findModels();
        foreach($models as $model)
        {
            echo $model->id.' _ ';
            $this->crop($model->getHash(),$model);
        }

    }

    protected function copyImage($model)
    {
        $filename = Yii::getAlias('@images/product/orig/' . $model->product->image);
        $fileSave = Yii::getAlias('@images/product/orig/' . $model->getHash().'.jpg');
        $img = Image::getImagine()->open(Yii::getAlias($filename));
        $img->save($fileSave);
    }

    /**
     * Finds the productImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return productImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductImage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findProductModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModels()
    {
        return productImage::find()->all();
    }


    protected function crop($filename,$model)
    {
        /*570x430*/
            $this->resize($filename,570,430,$model);
        /*END*/

        /*570x401*/
            $this->resize($filename,570,401,$model);
        /*END*/

        /*540x350*/
            $this->resize($filename,540,350,$model);
        /*END*/

        /*540x368*/
            $this->resize($filename,540,368,$model);
        /*END*/

        /*540x*/
            $this->mansory($filename,540);
        /*END*/

        /*1170*/
            $this->resizeBig($filename,1170,$model);
        /*END*/
		
		/*watermark*/
            $this->watermark($filename,1170,$model);
        /*END*/

        /*96x96*/
            $this->thumbnail($filename,96,96,$model);
        /*END*/

        /*120x130*/
            $this->thumbnail($filename,120,130,$model);
        /*END*/


    }
	
	protected function watermark($filename, $width, $model)
    {
        $watermarkFilename = '@images/watermark.png';
        $w_width = 1170;
        $w_height = 1170;
        if($model->orientation == 'album')
        {
            $res = json_decode($model->resolution,true);
            $k = $res['width']/$res['height'];
            $w_height = round($w_width/$k)-70;
            $w_width = $w_width - 100;
        }
        else
        {
            $res = json_decode($model->resolution,true);
            $k = $res['height']/$res['width'];
            $w_width = round($w_height/$k);
            $sidebar = (1170-$w_width)/2;
            $w_width = $sidebar + $w_width -100;
            $w_height = $w_height-70;
        }

        Image::watermark('@images/product/' . $width . 'x/' . $filename . '.jpg', $watermarkFilename, [$w_width, $w_height])
            ->save(Yii::getAlias('@images/product/' . $width . 'x/' . $filename . '.jpg'), ['quality' => 80]);
    }


    protected function resizeBig($filename, $width, $model)
    {

        if ($model->orientation == 'album') {
            Image::resize(Yii::getAlias('@images/product/orig/' . $filename . '.jpg'), $width, 0)
                ->save(Yii::getAlias('@images/product/' . $width . 'x/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        } elseif ($model->orientation == 'portret') {

            Image::resize(Yii::getAlias('@images/product/orig/' . $filename . '.jpg'), 0, $width)
                ->save(Yii::getAlias('@images/product/' . $width . 'x/' . $filename . '.jpg'), ['quality' => 80]);

            Image::boxing(Yii::getAlias('@images/product/' . $width . 'x/' . $filename . '.jpg'), $width, $width)
                ->save(Yii::getAlias('@images/product/' . $width . 'x/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        }
    }

    protected function thumbnail($filename, $width, $height, $model)
    {
        if ($model->orientation == 'album') {
            Image::resize(Yii::getAlias('@images/product/orig/' . $filename . '.jpg'), 0, $height)
                ->save(Yii::getAlias('@images/product/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::thumbnail(Yii::getAlias('@images/product/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
                ->save(Yii::getAlias('@images/product/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        } elseif ($model->orientation == 'portret') {
            Image::resize(Yii::getAlias('@images/product/orig/' . $filename . '.jpg'), $width, 0)
                ->save(Yii::getAlias('@images/product/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::thumbnail(Yii::getAlias('@images/product/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
                ->save(Yii::getAlias('@images/product/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        }

        return false;
    }

    protected function mansory($filename, $width)
    {
        Image::resize(Yii::getAlias('@images/product/orig/' . $filename . '.jpg'), $width, 0)
            ->save(Yii::getAlias('@images/product/' . $width . 'x/' . $filename . '.jpg'), ['quality' => 80]);
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

    protected function getResolution($filename)
    {
        $size = Image::getResolution(Yii::getAlias('@images/product/orig/' . $filename . '.jpg'));

        return json_encode($size);
    }

    protected function getOrientation($filename)
    {

        $size = Image::getResolution(Yii::getAlias('@images/product/orig/' . $filename . '.jpg'));

        if (($size['width'] / $size['height']) >= 1)

            return 'album';

        else

            return 'portret';
    }


}
