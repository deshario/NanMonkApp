<?php

namespace app\controllers;

use app\models\Address;
use app\models\PersonMaster;
use kartik\growl\Growl;
use Yii;
use app\models\MonkhoodMaster;
use app\models\MonkhoodMasterSearch;
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
        $key = PersonMaster::find()->where('user_id = ' . $id)->one()->idperson;
        $dataProvider->query->where('idperson = '.$key);

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
        //return $data;
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

                $age = date_diff(date_create($model->childmonkdate), date_create('now'))->y;
                $model->childmonkage = $age;

                $age = date_diff(date_create($model->monk_date), date_create('now'))->y;
                $model->monk_age = $age;

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

    /**
     * Updates an existing MonkhoodMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->monkhood_id]);
        }

        return $this->render('update', [
            'model' => $model,
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
