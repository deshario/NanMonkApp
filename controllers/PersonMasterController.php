<?php

namespace app\controllers;

use app\models\Address;
use kartik\growl\Growl;
use Yii;
use app\models\PersonMaster;
use app\models\PersonMasterSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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

        if ($model->load(Yii::$app->request->post())) {
            $id = Yii::$app->user->identity->id;
            $model->user_id = $id;
            $photo = UploadedFile::getInstance($model, 'person_pic');
            $random_num = rand(0, 9999);
            $fileName = $random_num . '_' . time() . '_' . date('dmHi') . '.' . $photo->extension; // 9185_1530960936_07071755.jpg
            $photo->saveAs(Yii::getAlias('@webroot') . '/uploads/avatars/' . $fileName);
            $model->person_pic = $fileName;

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

            $model->save();
            //return $this->redirect(['view', 'id' => $model->idperson]);
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
        $amphur = ArrayHelper::map($master->getAmphur($model->address0->province_id), 'id', 'name');
        $district = ArrayHelper::map($master->getDistrict($model->address0->amphur_id), 'id', 'name');
        $phumlamnao_amphur = ArrayHelper::map($master->getAmphur($model->familyAddress->province_id), 'id', 'name');
        $phumlamnao_district = ArrayHelper::map($master->getDistrict($model->familyAddress->amphur_id), 'id', 'name');

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

    /**
     * Deletes an existing PersonMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PersonMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PersonMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
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
}
