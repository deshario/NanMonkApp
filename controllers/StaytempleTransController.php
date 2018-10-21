<?php

namespace app\controllers;

use app\models\Address;
use app\models\PersonMaster;
use kartik\growl\Growl;
use Yii;
use app\models\StaytempleTrans;
use app\models\StaytempleTransSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StaytempleTransController implements the CRUD actions for StaytempleTrans model.
 */
class StaytempleTransController extends Controller
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
     * Lists all StaytempleTrans models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StaytempleTransSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $id = Yii::$app->user->identity->id;
        $key = PersonMaster::find()->where('user_id = ' . $id)->one();
        if($key != null){
            $dataProvider->query->where('idperson = '.$key->idperson);
        }else{
            Yii::$app->getSession()->setFlash('campaign_broadcast_warning', [
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
     * Displays a single StaytempleTrans model.
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
     * Creates a new StaytempleTrans model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StaytempleTrans();
        $id = Yii::$app->user->identity->id;
        $key = PersonMaster::find()->where('user_id = ' . $id)->one()->idperson;
        $model->idperson = $key;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $address = new Address();
            $address->tambol_id = $model->tambol;
            $address->amphur_id = $model->amphur;
            $address->province_id = $model->province;
            $address->save();
            $model->staytemple_address = $address->address_id;

            $model->save();

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing StaytempleTrans model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->idstay]);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing StaytempleTrans model.
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
     * Finds the StaytempleTrans model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StaytempleTrans the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StaytempleTrans::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
