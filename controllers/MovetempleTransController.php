<?php

namespace app\controllers;

use app\models\Address;
use app\models\PersonMaster;
use app\models\Province;
use kartik\growl\Growl;
use Yii;
use app\models\MovetempleTrans;
use app\models\MovetempleTransSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MovetempleTransController implements the CRUD actions for MovetempleTrans model.
 */
class MovetempleTransController extends Controller
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
     * Lists all MovetempleTrans models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MovetempleTransSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $id = Yii::$app->user->identity->id;
        $key = PersonMaster::find()->where('user_id = ' . $id)->one();
        if ($key != null) {
            $dataProvider->query->where('idperson = '.$key->idperson);
        } else {
            Yii::$app->getSession()->setFlash('move_temple_fail', [
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
     * Displays a single MovetempleTrans model.
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
     * Creates a new MovetempleTrans model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MovetempleTrans();
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
        $model->province = $model->address0->province_id;
        $master = new PersonMaster();

        $amphur = ArrayHelper::map($master->getAmphur($model->address0->province_id), 'id', 'name');
        $district = ArrayHelper::map($master->getDistrict($model->address0->amphur_id), 'id', 'name');

        if ($model->load(Yii::$app->request->post())) {
            $address = new Address();
            $address->tambol_id = $model->tambol;
            $address->amphur_id = $model->amphur;
            $address->province_id = $model->province;
            $address->save();
            if($address->validate()){
                $model->address = $address->address_id;
                if($model->validate()){
                    $model->save();
                    Yii::$app->getSession()->setFlash('move_updated', [
                        'type' =>  Growl::TYPE_SUCCESS,
                        'duration' => 4000,
                        'icon' => 'fa fa-check',
                        'title' => 'การย้ายสังกัด',
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

    /**
     * Deletes an existing MovetempleTrans model.
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
     * Finds the MovetempleTrans model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MovetempleTrans the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MovetempleTrans::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
