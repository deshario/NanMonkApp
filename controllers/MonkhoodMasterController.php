<?php

namespace app\controllers;

use app\models\Address;
use app\models\PersonMaster;
use kartik\growl\Growl;
use Yii;
use app\models\MonkhoodMaster;
use app\models\MonkhoodMasterSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MonkhoodMasterController implements the CRUD actions for MonkhoodMaster model.
 */
class MonkhoodMasterController extends Controller
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
     * Lists all MonkhoodMaster models.
     * @return mixed
     */
    public function actionIndex($data_type = MonkhoodMaster::banpacha)
    {
        $searchModel = new MonkhoodMasterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $id = Yii::$app->user->identity->id;
        $key = PersonMaster::find()->where('user_id = ' . $id)->one();
        if($key != null){
            $dataProvider->query->where('idperson = '.$key->idperson);
        }else{
            Yii::$app->getSession()->setFlash('monkhood_master_fail', [
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
        if($data_type == MonkhoodMaster::banpacha){
            $data = $this->renderPartial('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            $data = $this->renderPartial('woopasombod', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return Json::encode($data);
    }

    /**
     * Displays a single MonkhoodMaster model.
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
     * Creates a new MonkhoodMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MonkhoodMaster();
        $id = Yii::$app->user->identity->id;
        $key = PersonMaster::find()->where('user_id = ' . $id)->one()->idperson;
        $model->idperson = $key;

        if ($model->load(Yii::$app->request->post())) {
            $records = MonkhoodMaster::find()->where(['idperson' => $key])->all();
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $eng_date = strtotime("now");
                $nowdate = (date("Y",$eng_date)+543).'-'.(date("m",$eng_date)).'-'.(date("d",$eng_date));

                if($model->childmonkdate != null){
                    $age = date_diff(date_create($model->childmonkdate), date_create($nowdate))->y;
                    $model->childmonkage = $age;
                }

                if($model->monk_date){
                    $age = date_diff(date_create($model->monk_date), date_create($nowdate))->y;
                    $model->monk_age = $age;
                }

                $address = new Address();
                $address->tambol_id = $model->tambol;
                $address->amphur_id = $model->amphur;
                $address->province_id = $model->province;
                $address->save();
                $model->childmonk_address = $address->address_id;

                $address = new Address();
                $address->tambol_id = $model->tambol_ii;
                $address->amphur_id = $model->amphur_ii;
                $address->province_id = $model->province_ii;
                $address->save();
                $model->childmonk_t1_address = $address->address_id;

                $address = new Address();
                $address->tambol_id = $model->tambol_iii;
                $address->amphur_id = $model->amphur_iii;
                $address->province_id = $model->province_iii;
                $address->save();
                $model->monk_address = $address->address_id;

                $address = new Address();
                $address->tambol_id = $model->tambol_iv;
                $address->amphur_id = $model->amphur_iv;
                $address->province_id = $model->province_iv;
                $address->save();
                $model->monk_t1_address = $address->address_id;

                $address = new Address();
                $address->tambol_id = $model->tambol_v;
                $address->amphur_id = $model->amphur_v;
                $address->province_id = $model->province_v;
                $address->save();
                $model->monk_t2_address = $address->address_id;

                $address = new Address();
                $address->tambol_id = $model->tambol_vi;
                $address->amphur_id = $model->amphur_vi;
                $address->province_id = $model->province_vi;
                $address->save();
                $model->monk_t3_address = $address->address_id;

                $address = new Address();
                $address->tambol_id = $model->tambol_vii;
                $address->amphur_id = $model->amphur_vii;
                $address->province_id = $model->province_vii;
                $address->save();
                $model->staymonk_address = $address->address_id;

                $transaction->commit();

                if($model->validate()){
                    foreach ($records as $user) {
                        $user->delete();
                    }
                    $model->save();
                    return $this->redirect(['/person-master/index']);
                }else{
                    return $model->getErrors();
                }
            }catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
                return $this->redirect(['index']);
            }
        }
        if($key == null || $key == ""){
            Yii::$app->getSession()->setFlash('denied_1', [
                'type' => Growl::TYPE_DANGER,
                'duration' => 5000,
                'icon' => 'fa fa-close',
                'title' => 'คำสั่งล้มเหลว',
                'message' => 'กรุณาบันทึกข้อมูลพืนฐานก่อนที่จะทำรายการอืนๆ',
                'positonY' => 'bottom',
                'positonX' => 'right'
            ]);
            return $this->redirect(['index']);
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $master = new PersonMaster();

        if($model->childmonkAddress != null){ //บรรพชา
            $model->province = $model->childmonkAddress->province_id;
            $child_amphur = ArrayHelper::map($master->getAmphur($model->childmonkAddress->province_id), 'id', 'name');
            $child_district = ArrayHelper::map($master->getDistrict($model->childmonkAddress->amphur_id), 'id', 'name');
        }else{
            $child_amphur = [];
            $child_district = [];
        }

        if($model->childmonkT1Address != null){ //บรรพชาให้
            $model->province_ii = $model->childmonkT1Address->province_id;
            $child_t1_amphur = ArrayHelper::map($master->getAmphur($model->childmonkT1Address->province_id), 'id', 'name');
            $child_t1_district = ArrayHelper::map($master->getDistrict($model->childmonkT1Address->amphur_id), 'id', 'name');
        }else{
            $child_t1_amphur = [];
            $child_t1_district = [];
        }

        if($model->monkAddress != null){ //อุปสมบท
            $model->province_iii = $model->monkAddress->province_id;
            $monk_t1_amphur = ArrayHelper::map($master->getAmphur($model->monkAddress->province_id), 'id', 'name');
            $monk_t1_district = ArrayHelper::map($master->getDistrict($model->monkAddress->amphur_id), 'id', 'name');
        }else{
            $monk_t1_amphur = [];
            $monk_t1_district = [];
        }

        if($model->monkT1Address != null){ //พระอุปัชฌาย์
            $model->province_iv = $model->childmonkT1Address->province_id;
            $monk_t2_amphur = ArrayHelper::map($master->getAmphur($model->monkT1Address->province_id), 'id', 'name');
            $monk_t2_district = ArrayHelper::map($master->getDistrict($model->monkT1Address->amphur_id), 'id', 'name');
        }else{
            $monk_t2_amphur = [];
            $monk_t2_district = [];
        }

        if($model->monkT2Address != null){ //พระกรรมวาจาจารย์
            $model->province_v = $model->monkT2Address->province_id;
            $monk_t3_amphur = ArrayHelper::map($master->getAmphur($model->monkT2Address->province_id), 'id', 'name');
            $monk_t3_district = ArrayHelper::map($master->getDistrict($model->monkT2Address->amphur_id), 'id', 'name');
        }else{
            $monk_t3_amphur = [];
            $monk_t3_district = [];
        }

        if($model->monkT3Address != null){ //พระอนุสาวนาจารย์
            $model->province_vi = $model->monkT3Address->province_id;
            $monk_t4_amphur = ArrayHelper::map($master->getAmphur($model->monkT3Address->province_id), 'id', 'name');
            $monk_t4_district = ArrayHelper::map($master->getDistrict($model->monkT3Address->amphur_id), 'id', 'name');
        }else{
            $monk_t4_amphur = [];
            $monk_t4_district = [];
        }

        if($model->staymonkAddress != null){ //สังกัดเมื่อบวช
            $model->province_vii = $model->staymonkAddress->province_id;
            $staymonk_amphur = ArrayHelper::map($master->getAmphur($model->staymonkAddress->province_id), 'id', 'name');
            $staymonk_district = ArrayHelper::map($master->getDistrict($model->staymonkAddress->amphur_id), 'id', 'name');
        }else{
            $staymonk_amphur = [];
            $staymonk_district = [];
        }

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();
            try {
                $eng_date = strtotime("now");
                $nowdate = (date("Y",$eng_date)+543).'-'.(date("m",$eng_date)).'-'.(date("d",$eng_date));

                if($model->childmonkdate != null){
                    $age = date_diff(date_create($model->childmonkdate), date_create($nowdate))->y;
                    $model->childmonkage = $age;
                }

                if($model->monk_date){
                    $age = date_diff(date_create($model->monk_date), date_create($nowdate))->y;
                    $model->monk_age = $age;
                }

                $address = new Address();
                $address->tambol_id = $model->tambol;
                $address->amphur_id = $model->amphur;
                $address->province_id = $model->province;
                $address->save();
                $model->childmonk_address = $address->address_id;

                $address = new Address();
                $address->tambol_id = $model->tambol_ii;
                $address->amphur_id = $model->amphur_ii;
                $address->province_id = $model->province_ii;
                $address->save();
                $model->childmonk_t1_address = $address->address_id;

                $address = new Address();
                $address->tambol_id = $model->tambol_iii;
                $address->amphur_id = $model->amphur_iii;
                $address->province_id = $model->province_iii;
                $address->save();
                $model->monk_address = $address->address_id;

                $address = new Address();
                $address->tambol_id = $model->tambol_iv;
                $address->amphur_id = $model->amphur_iv;
                $address->province_id = $model->province_iv;
                $address->save();
                $model->monk_t1_address = $address->address_id;

                $address = new Address();
                $address->tambol_id = $model->tambol_v;
                $address->amphur_id = $model->amphur_v;
                $address->province_id = $model->province_v;
                $address->save();
                $model->monk_t2_address = $address->address_id;

                $address = new Address();
                $address->tambol_id = $model->tambol_vi;
                $address->amphur_id = $model->amphur_vi;
                $address->province_id = $model->province_vi;
                $address->save();
                $model->monk_t3_address = $address->address_id;

                $address = new Address();
                $address->tambol_id = $model->tambol_vii;
                $address->amphur_id = $model->amphur_vii;
                $address->province_id = $model->province_vii;
                $address->save();
                $model->staymonk_address = $address->address_id;

                $transaction->commit();

                if($model->validate()){
                    Yii::$app->getSession()->setFlash('monkhood_updated', [
                        'type' =>  Growl::TYPE_SUCCESS,
                        'duration' => 4000,
                        'icon' => 'fa fa-check',
                        'title' => 'บรรพชาอุปสมบท',
                        'message' => 'ข้อมูลของคูณได้รับการปรับปรุงแล้ว',
                        'positonY' => 'bottom',
                        'positonX' => 'right'
                    ]);
                    $model->save();
                    return $this->redirect(['/person-master/index']);
                }else{
                    return $model->getErrors();
                }

            }catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
                return $this->redirect(['index']);
            }

            return $this->redirect(['/person-master/index']);
        }

        return $this->render('update', [
            'model' => $model,
            'child_amphur' => $child_amphur,
            'child_district' => $child_district,
            'child_t1_amphur' => $child_t1_amphur,
            'child_t1_district' => $child_t1_district,
            'monk_t1_amphur' => $monk_t1_amphur,
            'monk_t1_district' => $monk_t1_district,
            'monk_t2_amphur' => $monk_t2_amphur,
            'monk_t2_district' => $monk_t2_district,
            'monk_t3_amphur' => $monk_t3_amphur,
            'monk_t3_district' => $monk_t3_district,
            'monk_t4_amphur' => $monk_t4_amphur,
            'monk_t4_district' => $monk_t4_district,
            'staymonk_amphur' => $staymonk_amphur,
            'staymonk_district' => $staymonk_district,
        ]);
    }

    /**
     * Deletes an existing MonkhoodMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MonkhoodMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MonkhoodMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MonkhoodMaster::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
