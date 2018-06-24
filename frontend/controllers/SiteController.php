<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\Product;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\StaticPage;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
	
	public $limit;
    public $staticPage;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];

    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {

            if ($this->enableCsrfValidation && Yii::$app->getErrorHandler()->exception === null && !Yii::$app->getRequest()->validateCsrfToken()) {

                throw new BadRequestHttpException(Yii::t('yii', 'Unable to verify your data submission.'));
            }

            $this->layout = 'oyster_error';
            $this->staticPage = StaticPage::find()->limit('10')->all();
            return true;

        }
        return false;
    }

    public function actionIndex()
    {
        $this->layout = 'oyster_home';
		$this->limit = 18;
		$models = Product::find()->where(['home' => 1])->limit($this->limit)->orderBy('product_id DESC')->all();
        return $this->render('home',['models'=>$models]);
    }

    public function actionAbout()
    {
        $this->layout = 'oyster_about';

        $model = $this->getStaticPage('PACIFIC ABOUT US');
        if($model)
            return $this->render('about', ['model'=>$model]);
        else
            return $this->goHome();
    }

    public function actionPhilosophy()
    {
        $this->layout = 'oyster_about';

        $model = $this->getStaticPage('OUR PHILOSOPHY');
        if($model)
            return $this->render('about', ['model'=>$model]);
        else
            return $this->goHome();
    }

    public function actionMaket()
    {
        Yii::$app->view->params['searchModel'] = 'EEEEE' ;
        return $this->render('maket');
    }

    public function actionLogin()
    {
        $this->layout = 'oyster_fullscreen';
        Yii::$app->view->params['searchModel'] = 'EEEE';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {

        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $this->layout = 'oyster_fullwidth';

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionSignup()
    {
        $this->layout = 'oyster_fullscreen';

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionManage()
    {
        $this->redirect('/oyster/backend/web');
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    protected function getStaticPage($page)
    {
        $model= false;

        foreach($this->staticPage as $value)
        {
            if($value['title'] == $page)
            {
                $model = $value;
                $this->view->params['bg'] = $value->id;
            }

        }

        return $model;
    }


    protected function actionError()
    {

        print_r('error');

    }
}
