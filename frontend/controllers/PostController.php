<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Post;
use frontend\models\RelatedPost;
use frontend\models\PostSearch;
use frontend\models\Comment;
use yii\web\Response;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{

    public $layout = 'oyster';

    public $jsFile;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['like'],
                'rules' => [
                    [
                        'actions' => ['like'],
                        'allow' => true,
                        'roles' => ['user'],
                    ],

                ],
            ],
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

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new PostSearch();
        $dataProvider = $searchModel->searchGlobal(Yii::$app->request->queryParams);
        Yii::$app->view->params['searchModel'] = $searchModel;

        $dataProvider->pagination = [
            'defaultPageSize' => 6,
            'pageSizeLimit' => [6, 100],
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $searchModel = new PostSearch();
        $dataProvider = $searchModel->searchGlobal(Yii::$app->request->queryParams);
        Yii::$app->view->params['searchModel'] = $searchModel;
        $model = $this->findModel($id);
        $model->views = $model->views+1;
        $model->save();

        $commentModel = new Comment();
        $commentModel->post_id = $id;

        return $this->render('SinglePost/index', [
            'model' => $model,
            'modelRelated' => $this->findModelRelated($id),
            'commentModel' => $commentModel
        ]);
    }

    public function actionTag($title)
    {
        $searchModel = new PostSearch();
        $queryTag = array('r'=>'post/tag','PostSearch'=>array('tags'=>$title));
        $dataProvider = $searchModel->search($queryTag);

        Yii::$app->view->params['searchModel'] = $searchModel;

        $dataProvider->pagination = [
            'defaultPageSize' => 6,
            'pageSizeLimit' => [6, 100],
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCategory($category_id)
    {
        $category_id = (int)$category_id;
        $searchModel = new PostSearch();

        $queryTag = array('r'=>'post/category','PostSearch'=>array('category_id'=>$category_id));
        $dataProvider = $searchModel->search($queryTag);

        Yii::$app->view->params['searchModel'] = $searchModel;

        $dataProvider->pagination = [
            'defaultPageSize' => 6,
            'pageSizeLimit' => [6, 100],
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }



    public function actionGenerate($numm)
    {
        $numm = (int) $numm;
        for($i=0; $i<$numm; $i++)
        {
            $model = new Post();
            $model->title = 'Salut_'.$i;
            $model->content = 'lorem ipsum dolor sit amet. lorem ipsum dolor sit amet. lorem ipsum dolor sit amet _'.$i;
            $model->tags = 'yii, blog';
            $model->likes = 0;
            $model->status = 2;
            $model->author_id = 1;

            if(!$model->save())
                throw new NotFoundHttpException('Model Post NOT Save');

        }
    }

    /**
     * Updates an existing Post model.
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
     * Deletes an existing Post model.
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
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelRelated($id)
    {
        $model = RelatedPost::find()->where(['id_post' => $id])->limit(10)->all();
        if (!empty($model)) {
            return $model;
        } else {
            return false;
        }
    }

    public function actionLike()
    {

        if (Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $model = $this->findModel(Yii::$app->request->post('postId'));

            if($model)
                return $model->like();
            else
                return   array(
                    'body'    => 'Model "Product" Error',
                    'success' => false,
                );
        }
        else
            return null;
    }
}
