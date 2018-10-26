<?php

namespace app\controllers;

use app\models\SignupForm;
use kartik\growl\Growl;
use MongoDB\Driver\Manager;
use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->setPassword($model->password);
            $model->generateAuthKey();
            $model->created_at = time();
            $model->updated_at = time();
            if($model->save()){
                return $this->redirect(['manage']);
            }
        } else {
            $model->username = $this->randomString(8);
            $model->email = strtolower($model->username).'@virtual.com';
            return $this->render('generate_form', [
                'model' => $model,
            ]);
        }
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        $this->layout = "main-signup";
        return $this->render('theme_signup', [
            'model' => $model,
        ]);
    }

    public function actionManage()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProvider->query->where('roles = '.User::ROLE_USER);
        $dataProvider->query->where('id <> '.Yii::$app->user->identity->id);

        return $this->render('manage', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function randomString($length = 8) {
        $str = "";
        $characters = array_merge(range('A','Z'),range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

    public function actionGenerate(){
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {

              $counter =  $model->no_users+1;

            for( $i = 0; $i<5; $i++ ) {
                $virtual = $this->randomString(8);
                $email = strtolower($virtual).'@virtual.com';
                $model->username = $virtual;
                $model->email = $email;
                $model->status = \app\models\User::STATUS_ACTIVE;
                $model->setPassword($model->password);
                $model->generateAuthKey();
                $model->created_at = time();
                $model->updated_at = time();
                $model->save();
            }

            return $this->redirect(['/user/manage']);
        }
        return $this->render('generate_form', [
            'model' => $model,
        ]);
    }

    public function actionDeactivate($id)
    {
        $model = $this->findModel($id);
        $model->status = User::STATUS_DELETED;
        $model->password = "deshario"; // Only For Validation
        if($model->save()){
            Yii::$app->getSession()->setFlash('login_success', [
                'type' =>  Growl::TYPE_DANGER,
                'duration' => 5000,
                'icon' => 'fa fa-lock fa-lg',
                'title' => $model->username.'ถูกปิดการใช้งาน',
                'message' => $model->username." จะไม่สามารถเข้าถึงระบบได้อีกต่อไป",
                'positonY' => 'bottom',
                'positonX' => 'right'
            ]);
        }
        return $this->redirect(['manage']);
    }

    public function actionActivate($id)
    {
        $model = $this->findModel($id);
        $model->status = User::STATUS_ACTIVE;
        $model->password = "deshario"; // Only For Validation
        if($model->save()){
            Yii::$app->getSession()->setFlash('login_success', [
                'type' =>  Growl::TYPE_SUCCESS,
                'duration' => 5000,
                'icon' => 'fa fa-unlock fa-lg',
                'title' => $model->username.' ถูกเปิดการใช้งาน',
                'message' => $model->username." ได้รับสืทธิในการเข้าถึงระบบเรียบร้อย",
                'positonY' => 'bottom',
                'positonX' => 'right'
            ]);
        }
        return $this->redirect(['manage']);
    }

    public function actionChange_roles($id,$newRole)
    {
        $customText = '';
        $model = $this->findModel($id);
        $model->password = "deshario";
        if($newRole == User::ROLE_ADMIN){
            $model->roles = User::ROLE_ADMIN;
            $customText = 'ผู้ดูแลระบบ';
        }else{
            $model->roles = User::ROLE_USER;
            $customText = 'ผู้ใช้งานปกติ';
        }
        if($model->save()){
            Yii::$app->getSession()->setFlash('chane_role', [
                'type' =>  Growl::TYPE_SUCCESS,
                'duration' => 5000,
                'icon' => 'fa fa-key',
                'title' => 'เปลียนแปลงสิทธิ',
                'message' => $model->username." ได้รับสืทธิในการเข้าถึงเป็น".$customText,
                'positonY' => 'bottom',
                'positonX' => 'right'
            ]);
        }
        return $this->redirect(['manage']);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())){
            $model->setPassword($model->password);
            $model->save();
            return $this->redirect(['manage']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['manage']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
