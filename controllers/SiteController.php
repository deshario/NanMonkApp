<?php
namespace app\controllers;

use app\components\AccessRule;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use app\models\User;
use kartik\growl\Growl;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\LoginForm;
use app\models\ContactForm;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className()
                ],
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'], // only allowed for guest
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'], // only allowed for logged in users
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

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        //$this->layout = "main-signup";
//        return $this->render('index');
        return $this->redirect(['/site/home']);
//        return 'ee';
    }

    public function actionApi(){

        return $this->renderPartial('api');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $MStatus = Yii::$app->user->identity->status;
            if($MStatus == User::STATUS_DELETED){
                Yii::$app->getSession()->setFlash('deleted', [
                    'type' => Growl::TYPE_DANGER,
                    'duration' => 5000,
                    'icon' => 'fa fa-close',
                    'title' => 'บัญชีนี้อยู่ในสถานะปิดการใช้งาน',
                    'message' => 'กรุณาติดต่อผู้ดูแลระบบเพื่อเปิดใช้งาน',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
                return $this->redirect(['login']);
            }else{
                $MRoles = Yii::$app->user->identity->roles;
                $logged_user = Yii::$app->user->identity->username;
                Yii::$app->getSession()->setFlash('jab_login_success', [
                    'type' =>  Growl::TYPE_SUCCESS,
                    'duration' => 6000,
                    'icon' => 'fa fa-user-o',
                    'title' => ' สวัสดีคุณ '.$logged_user.' !',
                    'message' => 'ยินดีต้อนรับสู่ระบบทะเบียนประวัติพระภิกษุสามเณรในจังหวัดน่าน.',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
                if($MRoles == User::ROLE_USER){
                    return $this->redirect(['/person-master/index']);
                }elseif ($MRoles == User::ROLE_ADMIN){
                    return $this->redirect(['/hobby/index']);
                }
            }

        } else {
            $model->password = '';
            $this->layout = "main-login";
            return $this->render('theme_login', [
                'model' => $model,
            ]);
        }
    }

    public function actionHome(){
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site/login']);
        }else {
            $MRoles = Yii::$app->user->identity->roles;
            if ($MRoles == User::ROLE_USER) {
                return $this->redirect(['/person-master/index']);
            } elseif ($MRoles == User::ROLE_ADMIN) {
                return $this->redirect(['/hobby/index']);
            }
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        //return $this->goHome();
        return $this->redirect('home');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    //return $this->goHome();
                    return $this->redirect('home');
                }
                echo 'hello world';
            }
        }
        $this->layout = "main-signup";
        return $this->render('theme_signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionFault()
    {
        $exception = Yii::$app->errorHandler->exception;

        if ($exception !== null) {
            $statusCode = $exception->statusCode;
            $name = $exception->getName();
            $message = $exception->getMessage();

//            Yii::$app->getSession()->setFlash('alert1', [
//                'type' => 'info',
//                'duration' => 3000,
//                'icon' => 'fa fa-envelope-o',
//                'title' => 'Incoming Request',
//                'message' => 'test hahah',
//                'positonY' => 'top',
//                'positonX' => 'right'
//            ]);

            return $this->render('fault', [
                'exception' => $exception,
                'statusCode' => $statusCode,
                'name' => $name,
                'message' => $message
            ]);
        }
    }
}