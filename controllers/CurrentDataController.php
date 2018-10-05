<?php

namespace app\controllers;

use app\models\Address;
use app\models\MainTable;
use app\models\MainTableSearch;
use app\models\Zipcode;
use Yii;
use app\models\CurrentData;
use app\models\CurrentDataSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CurrentDataController implements the CRUD actions for CurrentData model.
 */
class CurrentDataController extends Controller
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

    public function actionIndex()
    {
        //$searchModel = new CurrentDataSearch();
        $searchModel = new MainTableSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
        $model = new CurrentData();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $user_id = Yii::$app->user->identity->id;
                $address = new Address();
                $address->home_no = $model->homeno;
                $address->province = $model->province;
                $address->amphur = $model->amphur;
                $address->tambol = $model->tambol;
                $zip = \app\models\Zipcode::find()->where('PROVINCE_ID = '.$model->province)->one()->ZIPCODE;
                $address->zipcode = $zip;
                $address->save();

                $model->current_address = $address->address_id;
                $model->save();

                $main = MainTable::find()->where('user_id = ' . $user_id)->one();
                $main->current_id = $model->current_id;
                $main->save();
            }
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->current_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = CurrentData::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetamphur()
    {
        $out = [];
        $current = new CurrentData();
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $province_id = $parents[0];
                //$out = $this->getAmphur($province_id);
                $out = $current->getAmphur($province_id);
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionGetdistrict()
    {
        $out = [];
        $current = new CurrentData();
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $province_id = empty($ids[0]) ? null : $ids[0];
            $amphur_id = empty($ids[1]) ? null : $ids[1];
            if ($province_id != null) {
                // $data = $this->getDistrict($amphur_id);
                $data = $current->getDistrict($amphur_id);
                echo Json::encode(['output' => $data, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }
}
