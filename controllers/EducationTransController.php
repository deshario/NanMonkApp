<?php

namespace app\controllers;

use app\models\Address;
use app\models\PersonMaster;
use kartik\growl\Growl;
use Yii;
use app\models\EducationTrans;
use app\models\EducationTransSearch;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EducationTransController implements the CRUD actions for EducationTrans model.
 */
class EducationTransController extends Controller
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
     * Lists all EducationTrans models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EducationTransSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $id = Yii::$app->user->identity->id;
        $key = PersonMaster::find()->where('user_id = ' . $id)->one();
        if($key != null){
            $dataProvider->query->where('idperson = '.$key->idperson);
        }else{
            Yii::$app->getSession()->setFlash('education_trans_fail', [
                'type' => Growl::TYPE_DANGER,
                'duration' => 5000,
                'icon' => 'fa fa-close',
                'title' => 'คำสั่งลมเหลว',
                'message' => 'กรุณากรอกข้อมูลพืนฐานเป็นอันดับแรก',
                'positonY' => 'bottom',
                'positonX' => 'right'
            ]);
            return $this->redirect(['person-master/index']);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EducationTrans model.
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
     * Creates a new EducationTrans model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EducationTrans();
        $id = Yii::$app->user->identity->id;
        $key = PersonMaster::find()->where('user_id = ' . $id)->one()->idperson;
        $model->idperson = $key;

        if ($model->load(Yii::$app->request->post())) {
            $address = new Address();
            $address->tambol_id = $model->tambol;
            $address->amphur_id = $model->amphur;
            $address->province_id = $model->province;
            $address->save();
            $model->address = $address->address_id;

            $this->CreateDir($model->idperson);
            $model->attachfile = $this->uploadSingleFile($model);
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $master = new PersonMaster();
        $model->province = $model->address0->province_id;
        $amphur = ArrayHelper::map($master->getAmphur($model->address0->province_id), 'id', 'name');
        $district = ArrayHelper::map($master->getDistrict($model->address0->amphur_id), 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {
            $address = new Address();
            $address->tambol_id = $model->tambol;
            $address->amphur_id = $model->amphur;
            $address->province_id = $model->province;
            if($address->validate()){
                $address->save();
                $model->address = $address->address_id;
                if($model->validate()){
                    $model->attachfile = $this->uploadSingleFile($model);
                    $model->save();
                    Yii::$app->getSession()->setFlash('education_trans_updated', [
                        'type' =>  Growl::TYPE_SUCCESS,
                        'duration' => 4000,
                        'icon' => 'fa fa-check',
                        'title' => 'ประวัติการศึกษา',
                        'message' => 'ข้อมูลของคูณได้รับการปรับปรุงแล้ว',
                        'positonY' => 'bottom',
                        'positonX' => 'right'
                    ]);
                }
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'amphur' => $amphur,
            'district' => $district
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = EducationTrans::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function CreateDir($folderName){
        if($folderName != NULL){
            $basePath = EducationTrans::getUploadPath();
            try {
                if (BaseFileHelper::createDirectory($basePath . $folderName, 0777)) {
                    $temp = 1;
                    // BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail', 0777);
                }
            } catch (\yii\base\Exception $e) {
            }
        }
        return;
    }

    private function uploadSingleFile($model,$tempFile=null){
        $file = [];
        $json = '';
        $newFileName = '';
        try {
            $UploadedFile = UploadedFile::getInstance($model,'attachfile');
            if($UploadedFile !== null){
                $uploadPath = EducationTrans::getUploadPath();
                $oldFileName = $UploadedFile->basename.'.'.$UploadedFile->extension;
                $newFileName = md5($UploadedFile->basename.time()).'.'.$UploadedFile->extension;
                $UploadedFile->saveAs($uploadPath.'/'.$model->idperson.'/'.$newFileName);
                //$UploadedFile->saveAs(ActivityFiles::UPLOAD_FOLDER.'/'.$newFileName);
                $file[$newFileName] = $oldFileName;
                $json = Json::encode($file);
            }else{
                $json=$tempFile;
            }
        } catch (Exception $e) {
            $json=$tempFile;
        }
        //return $json ;
        return $newFileName ;
    }

    public function actionDownload($id,$citizen,$fileName){
        $model = $this->findModel($id);
        if(!empty($model->attachfile)){
            Yii::$app->response->sendFile($model->getUploadPath().'/'.$citizen.'/'.$fileName);
        }else{
            $this->redirect(['index']);
        }
    }
}
