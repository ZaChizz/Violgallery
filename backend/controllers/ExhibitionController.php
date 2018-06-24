<?php

namespace backend\controllers;

use Yii;
use backend\models\MultipleUploadForm;
use yii\web\UploadedFile;
use backend\models\Exhibition;
use backend\models\ExhibitionSearch;
use backend\models\ExhibitionImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\imagine\Image;
use Imagine\Image\Point;

/**
 * ExhibitionController implements the CRUD actions for Exhibition model.
 */
class ExhibitionController extends Controller
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
     * Lists all Exhibition models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExhibitionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCoverImage($id)
    {

        if (($model = Exhibition::findOne($id))== null) {
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
                        $file->saveAs($model->getCoverPath());
                    }
                    $model->resolution = $this->getResolution($model->getHash());
                    $model->orientation = $this->getOrientation($model->getHash());
                    $this->crop($model->getHash(),$model);
                    $this->renameCover($model);
                }
                return $this->redirect(['index']);
            }

        }


        return $this->render('coverImage', [
            'uploadForm' => $form,
        ]);
    }

    /**
     * Displays a single Exhibition model.
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
     * Creates a new Exhibition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
/*    public function actionCreate()
    {
        $model = new Exhibition();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing Exhibition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $searchModel = new ExhibitionImageSearch();
        $searchModel->exhibition_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Deletes an existing Exhibition model.
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
     * Finds the Exhibition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Exhibition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Exhibition::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function crop($filename,$model)
    {
        /*500x1080*/
        $this->resize($filename,500,1080,$model);
        /*END*/


        /*96x96*/
        $this->thumbnail($filename,96,96,$model);
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

    protected function thumbnail($filename, $width, $height, $model)
    {
        if ($model->orientation == 'album') {
            Image::resize(Yii::getAlias('@images/exhibition/cover/orig/' . $filename . '.jpg'), 0, $height)
                ->save(Yii::getAlias('@images/exhibition/cover/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::thumbnail(Yii::getAlias('@images/exhibition/cover/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
                ->save(Yii::getAlias('@images/exhibition/cover/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        } elseif ($model->orientation == 'portret') {
            Image::resize(Yii::getAlias('@images/exhibition/cover/orig/' . $filename . '.jpg'), $width, 0)
                ->save(Yii::getAlias('@images/exhibition/cover/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            Image::thumbnail(Yii::getAlias('@images/exhibition/cover/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
                ->save(Yii::getAlias('@images/exhibition/cover/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

            return true;
        }

        return false;
    }

    protected function resizePortret($filename, $width, $height)
    {
        Image::resize(Yii::getAlias('@images/exhibition/cover/orig/' . $filename . '.jpg'), $width, 0)
            ->save(Yii::getAlias('@images/exhibition/cover/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        Image::thumbnail(Yii::getAlias('@images/exhibition/cover/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
            ->save(Yii::getAlias('@images/exhibition/cover/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        return true;
    }

    protected function resizeAlbum($filename, $width, $height)
    {
        Image::resize(Yii::getAlias('@images/exhibition/cover/orig/' . $filename . '.jpg'), 0, $height)
            ->save(Yii::getAlias('@images/exhibition/cover/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        Image::thumbnail(Yii::getAlias('@images/exhibition/cover/' . $width . 'x' . $height . '/' . $filename . '.jpg'), $width, $height)
            ->save(Yii::getAlias('@images/exhibition/cover/' . $width . 'x' . $height . '/' . $filename . '.jpg'), ['quality' => 80]);

        return true;
    }

    protected function getResolution($filename)
    {
        $size = Image::getResolution(Yii::getAlias('@images/exhibition/cover/orig/' . $filename . '.jpg'));

        return json_encode($size);
    }

    protected function getOrientation($filename)
    {

        $size = Image::getResolution(Yii::getAlias('@images/exhibition/cover/orig/' . $filename . '.jpg'));

        if (($size['width'] / $size['height']) >= 1)

            return 'album';

        else

            return 'portret';
    }

    protected function renameCover($model)
    {

            if(rename(Yii::getAlias('@images/exhibition/cover/500x1080/' . $model->getHash() . '.jpg'),Yii::getAlias('@images/exhibition/cover/placeholder'.$model->id . '.jpg')))
            {
                return true;
            }

            else
                return false;


    }
}
