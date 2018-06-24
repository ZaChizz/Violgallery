<?php

namespace frontend\controllers;

use Yii;
use frontend\models\CommentProduct;
use frontend\models\CommentProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;


/**
 * CommentProductController implements the CRUD actions for CommentProduct model.
 */
class CommentProductController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['comment'],
                'rules' => [
                    [
                        'actions' => ['comment'],
                        'allow' => true,
                        'roles' => ['user'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'comment' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CommentProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CommentProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CommentProduct model.
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
     * Creates a new CommentProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionComment()
    {
        $model = new CommentProduct();

        if ($model->load(Yii::$app->request->post())) {
            $model->create_time = time();
            $model->update_time = time();
            $model->status = CommentProduct::PUBLISHED_VALUE;
            $model->author_id = Yii::$app->getUser()->id;
            if($model->save())
                $this->redirect(Url::to(['product/view', 'id' => $model->product_id]));
            else
                Yii::$app->getSession()->setFlash('error', 'Sorry, something wrong!');
        }

        return Url::home();
    }

    /**
     * Updates an existing CommentProduct model.
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
     * Deletes an existing CommentProduct model.
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
     * Finds the CommentProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CommentProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CommentProduct::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
