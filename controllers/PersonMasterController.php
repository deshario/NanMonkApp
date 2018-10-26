<?php

namespace app\controllers;

use app\models\Address;
use kartik\growl\Growl;
use Mpdf\Mpdf;
use Yii;
use app\models\PersonMaster;
use app\models\PersonMasterSearch;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

/**
 * PersonMasterController implements the CRUD actions for PersonMaster model.
 */
class PersonMasterController extends Controller
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
     * Lists all PersonMaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('user_id = ' . Yii::$app->user->identity->id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PersonMaster model.
     * @param string $id
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
     * Creates a new PersonMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PersonMaster();

        if(Yii::$app->request->isAjax){
            $model->load(Yii::$app->request->post());
            return Json::encode(\yii\widgets\ActiveForm::validate($model));
        }

        if ($model->load(Yii::$app->request->post())) {
            $id = Yii::$app->user->identity->id;
            $model->user_id = $id;
//            $photo = UploadedFile::getInstance($model, 'person_pic');
//            $random_num = rand(0, 9999);
//            $fileName = $random_num . '_' . time() . '_' . date('dmHi') . '.' . $photo->extension; // 9185_1530960936_07071755.jpg
//            $photo->saveAs(Yii::getAlias('@webroot') . '/uploads/avatars/' . $fileName);

            $model->person_pic = $this->uploadSingleFile($model);

            $address = new Address();
            $address->tambol_id = $model->tambol;
            $address->amphur_id = $model->amphur;
            $address->province_id = $model->province;
            $address->save();
            $model->address = $address->address_id;

            $address_phumlamnao = new Address();
            $address_phumlamnao->tambol_id = $model->tambol_phumlamnao;
            $address_phumlamnao->amphur_id = $model->amphur_phumlamnao;
            $address_phumlamnao->province_id = $model->province_phumlamnao;
            $address_phumlamnao->save();
            $model->family_address = $address_phumlamnao->address_id;

            if($model->validate()){
                $model->save();
                Yii::$app->getSession()->setFlash('person_create_save', [
                    'type' =>  Growl::TYPE_SUCCESS,
                    'duration' => 4000,
                    'icon' => 'fa fa-check',
                    'title' => 'ข้อมูลพืนฐาน',
                    'message' => 'ข้อมูลของคูณได้รับการบันทึกแล้ว',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
            }else{
                Yii::$app->getSession()->setFlash('person_validation_fail', [
                    'type' =>  Growl::TYPE_DANGER,
                    'duration' => 4000,
                    'icon' => 'fa fa-close',
                    'title' => 'ข้อมูลพืนฐาน',
                    'message' => 'ไม่สามารถบันทึกได้ เนื่องจากข้อมูลของคูณไม่ถูกต้อง',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
            }
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
        $model->province_phumlamnao = $model->familyAddress->province_id;
        $amphur = ArrayHelper::map($master->getAmphur($model->address0->province_id), 'id', 'name');
        $district = ArrayHelper::map($master->getDistrict($model->address0->amphur_id), 'id', 'name');
        $phumlamnao_amphur = ArrayHelper::map($master->getAmphur($model->familyAddress->province_id), 'id', 'name');
        $phumlamnao_district = ArrayHelper::map($master->getDistrict($model->familyAddress->amphur_id), 'id', 'name');

        if(Yii::$app->request->isAjax){
            $model->load(Yii::$app->request->post());
            return Json::encode(\yii\widgets\ActiveForm::validate($model));
        }

        if ($model->load(Yii::$app->request->post())) {
            $address_1 = null;
            $address_2 = null;
            if ($model->province != null) {
                $address = new Address();
                $address->tambol_id = $model->tambol;
                $address->amphur_id = $model->amphur;
                $address->province_id = $model->province;
                if($address->validate()){
                    $address->save();
                    $model->address = $address->address_id;
                }
            }

            if ($model->province_phumlamnao != null) {
                $address_phumlamnao = new Address();
                $address_phumlamnao->tambol_id = $model->tambol_phumlamnao;
                $address_phumlamnao->amphur_id = $model->amphur_phumlamnao;
                $address_phumlamnao->province_id = $model->province_phumlamnao;
                if($address_phumlamnao->validate()){
                    $address_phumlamnao->save();
                    $model->family_address = $address_phumlamnao->address_id;
                }
            }
            $model->person_pic = $this->uploadSingleFile($model);
            if($model->validate()){
                $model->save();
                Yii::$app->getSession()->setFlash('basicinfo_updated', [
                    'type' =>  Growl::TYPE_SUCCESS,
                    'duration' => 4000,
                    'icon' => 'fa fa-check',
                    'title' => 'ข้อมูลพืนฐาน',
                    'message' => 'ข้อมูลของคูณได้รับการปรับปรุงแล้ว',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'amphur' => $amphur,
            'district' => $district,
            'phumlamnao_amphur' => $phumlamnao_amphur,
            'phumlamnao_district' => $phumlamnao_district,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = PersonMaster::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetamphur()
    {
        $out = [];
        $master = new PersonMaster();
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $province_id = $parents[0];
                //$out = $this->getAmphur($province_id);
                $out = $master->getAmphur($province_id);
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public static function actionGetdistrict()
    {
        $out = [];
        $master = new PersonMaster();
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $province_id = empty($ids[0]) ? null : $ids[0];
            $amphur_id = empty($ids[1]) ? null : $ids[1];
            if ($province_id != null) {
                // $data = $this->getDistrict($amphur_id);
                $data = $master->getDistrict($amphur_id);
                echo Json::encode(['output' => $data, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    private function uploadSingleFile($model,$tempFile=null){
        $file = [];
        $json = '';
        $temp = '';
        try {
            $UploadedFile = UploadedFile::getInstance($model,'person_pic');
            if($UploadedFile !== null){
                $uploadPath = PersonMaster::getUploadPath();
                $temp = $model->idperson.'.'.$UploadedFile->extension;
                $FileName = $uploadPath.$temp;
                if(file_exists($FileName)){
                    @unlink($FileName);
                }
                $UploadedFile->saveAs($FileName);
            }else{
                $json=$tempFile;
            }
        } catch (Exception $e) {
            $json=$tempFile;
        }
        return $temp ;
    }

    public function actionReport($id) {
        //$mpdf = new Mpdf(['mode' => 's']);
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/mpdf/temp']);
        $content  = $this->renderPartial('report', [
            'id' => $id,
        ]);

        //return $content;

        $stylesheet = "
        body{font-family: Garuda}
         u.dotted{
            border-bottom: 1px dotted #000;
            text-decoration: none;
        }

        ";

        $mpdf->SetHeader('||{PAGENO}');
        //$mpdf->SetFooter('|'.'ผู้รับผิดชอบ : '.$model->responsibleBy->responsible_by.'|');
        //$mpdf->SetWatermarkText('Deshario');
        //$mpdf->showWatermarkText = true;
        //$mpdf->margin_bottom_collapse = 5;

        $mpdf->AddPageByArray([
            'resetpagenum' => '1'
        ]);

        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($content,2);
        $mpdf->Output('ประวัติของฉัน', 'D');

    }
}
