<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Product;
use frontend\models\Category;
use frontend\models\Genre;
use frontend\models\Style;
use frontend\models\ProductSearch;
use frontend\models\Artist;
use frontend\models\CommentProduct;
use yii\web\Response;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;


/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'oyster_category';

        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionCategory($category_id=0)
    {
		$this->layout = 'oyster_category';
		
		$categoris = Category::find()->all();
        $searchModel = new ProductSearch();
		if($category_id)
			$queryCategory = array('r'=>'product/category','ProductSearch'=>array('category_id'=>$category_id));
        else
            $queryCategory = Yii::$app->request->post();


		
		$dataProvider = $searchModel->search($queryCategory);
		
		 Yii::$app->view->params['searchModel'] = $searchModel;
		 
		 $dataProvider->pagination = [
            'defaultPageSize' => 12,
            'pageSizeLimit' => [12, 100],
        ];

        return $this->render('category', [
			'category' => $categoris,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionGenre($_id=0)
    {
        $this->layout = 'oyster_category';

        $genre = Genre::find()->all();
        $searchModel = new ProductSearch();
        if($_id)
            $query = array('r'=>'product/genre','ProductSearch'=>array('genre_id'=>$_id));
        else
            $query = Yii::$app->request->post();

        $dataProvider = $searchModel->search($query);

        Yii::$app->view->params['searchModel'] = $searchModel;

        $dataProvider->pagination = [
            'defaultPageSize' => 12,
            'pageSizeLimit' => [12, 100],
        ];

        return $this->render('category', [
            'genre' => $genre,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionStyle($_id=0)
    {
        $this->layout = 'oyster_category';

        $style = Style::find()->all();
        $searchModel = new ProductSearch();
        if($_id)
            $query = array('r'=>'product/genre','ProductSearch'=>array('style_id'=>$_id));
        else
            $query = Yii::$app->request->post();

        $dataProvider = $searchModel->search($query);

        Yii::$app->view->params['searchModel'] = $searchModel;

        $dataProvider->pagination = [
            'defaultPageSize' => 12,
            'pageSizeLimit' => [12, 100],
        ];

        return $this->render('category', [
            'genre' => $style,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$this->layout = 'oyster_detail';
		$model = $this->findModel($id);
        $model->view = $model->view+1;
        $model->save();
		$recentModel = $this->recentModel($model);
		$relatedModel = $this->relatedModel($model);

        $commentModel = new CommentProduct();
        $commentModel->product_id = $id;

		
        return $this->render('view', [
            'model' => $model,
			'recentModel' => $recentModel,
			'relatedModel' => $relatedModel,
            'commentModel' => $commentModel
        ]);
    }

    public function actionArtists()
    {
        $this->layout = 'oyster_gallery';

        $artists = Artist::find()->limit('3')->all();
        $renderOption = $this->getProduct($artists,2);

        return $this->render('artists', ['models'=>$renderOption['models'], 'elements'=>$renderOption['elements'], 'offset'=>count($artists)]);
    }

	
	public function actionGallery()
    {
		$this->layout = 'oyster_gallery';
		
		$categories = Category::find()->all();
        $searchModel = new ProductSearch();
		
		$dataProvider = $searchModel->searchAll();
		
		 $dataProvider->pagination = [
           // 'defaultPageSize' => 40,
            'pageSizeLimit' => [40, 100],
        ];

        return $this->render('gallery', [
			'categories' => $categories,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	protected function recentModel($product)
    {
       $models = Product::find()->where(['artist_id' => $product->artist_id])->andWhere('product_id != :product_id',[':product_id'=>$product->product_id])->limit(6)->orderBy('product_id DESC')->all();
	   return $models;
    }
	
	protected function relatedModel($product)
    {
       $models = Product::find()->where(['category_id' => $product->category_id])->andWhere('artist_id != :artist_id',[':artist_id'=>$product->artist_id])->limit(3)->orderBy('product_id DESC')->all();
	   return $models;
    }

    protected function getProduct($artists,$maxItems)
    {
        $renderOption = array();

        if($artists){
            foreach($artists as $value)
            {
                if(isset($value->products))
                    $renderOption = $this->toArray($renderOption, $value->products, $maxItems);
            }
        }

        return $renderOption;
    }

    protected function toArray($renderOption,$products,$maxItems)
    {
        for($i=0; $i<$maxItems; $i++)
        {
            if(isset($products[$i])) {
                $renderOption['models'][] = $products[$i];
                $renderOption['elements'][] = mb_strtolower($products[$i]->artist->lastname{0});
            }
        }

        return $renderOption;
    }


    public function actionLike()
    {

        if (Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $model = $this->findModel(Yii::$app->request->post('productId'));

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

    protected function toArrItems($items)
    {
        $res = array();
        if(!empty($items))
        {
            foreach($items['models'] as $key=>$model)
            {
                if(isset($model->productImages[0]))
                {
                    $img = $model->productImages[0]->getUrl('540x368');
                }
                else
                {
                    $img = $model->getUrl('540x368');
                }
                $res[] = array(
                    'src' =>$img,
                    'url' =>Url::to(['product/view','id'=>$model->product_id]),
                    'category' =>$items['elements'][$key],
                    'title' =>$model->title,
                    'view' =>$model->view,
                    'like' =>$model->like,
                    'rel' =>$model->product_id,
                    'auth' =>$model->find_like()?'icon-heart':'icon-heart-o',
                    'href' =>Url::to(['product/like']),
                    'artist' => $model->artist->lastname.'&nbsp;'.$model->artist->name
                );
            }
        }

        $res[] = 'end array';
        return $res;
    }

    public function actionItems() {

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_RAW;

            $offset = json_decode(Yii::$app->request->post('productId'), true);
            $artists = Artist::find()->offset($offset['offset'])->limit('2')->all();
            $productRender = $this->getProduct($artists,2);
            $productArr = $this->toArrItems($productRender);

            if(count($productArr)>1){
                $res = array(
                    'body' => $productArr,
                    'success' => true,
                    'offset' => count($artists),
                    'items' => count($productRender['models'])
                );
            }
            else
            {
                $res = array(
                    'body' => $productArr,
                    'success' => true,
                    'offset' => 0,
                    'items' => 0
                );
            }

            $res = json_encode($res, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
            return $res;
        }

    }
	
}
