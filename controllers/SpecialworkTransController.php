<?php

namespace app\controllers;

use app\models\PersonMaster;
use kartik\growl\Growl;
use Yii;
use app\models\SpecialworkTrans;
use app\models\SpecialworkTransSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SpecialworkTransController implements the CRUD actions for SpecialworkTrans model.
 */
class SpecialworkTransController extends Controller
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
     * Lists all SpecialworkTrans models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SpecialworkTransSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $id = Yii::$app->user->identity->id;
        $key = PersonMaster::find()->where('user_id = ' . $id)->one();
        if($key != null){
            $dataProvider->query->where('idperson = '.$key->idperson);
        }else{
            Yii::$app->getSession()->setFlash('special_work_fail', [
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

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new SpecialworkTrans();
        $id = Yii::$app->user->identity->id;
        $key = PersonMaster::find()->where('user_id = ' . $id)->one()->idperson;
        $model->idperson = $key;

        if ($model->load(Yii::$app->request->post())) {
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SpecialworkTrans model.
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
     * Finds the SpecialworkTrans model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SpecialworkTrans the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SpecialworkTrans::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
