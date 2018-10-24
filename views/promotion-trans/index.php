<?php

use kartik\tabs\TabsX;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PromotionTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ลำดับสมณศักดิ์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-trans-index">

    <?php $content = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'showOnEmpty' => false,
        'summary' => '',
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn', 'header' => '',],

            //'idpos',
            //'idperson',
            //'idpromotion',
            [
                'attribute' => 'idpromotion',
                'filter' => ArrayHelper::map(\app\models\Promotion::find()->all(), 'idpromotion', 'promotionname'),
                'value' => function($model){
                    return $model->promotion->promotionname;
                }
            ],
            'promotiondate',
            //'place1',
            //'place2',
            //'temple',
            ['attribute' => 'temple_address',
                'value' => function ($model) {
                    $province_id = $model->templeAddress->province_id;
                    $amphur_id = $model->templeAddress->amphur_id;
                    $tambol_id = $model->templeAddress->tambol_id;
                    $province = \app\models\Province::find()->where('PROVINCE_ID = ' . $province_id)->one()->PROVINCE_NAME;
                    $amphur = \app\models\Amphur::find()->where('AMPHUR_ID = ' . $amphur_id)->one()->AMPHUR_NAME;
                    $tambon = \app\models\District::find()->where('DISTRICT_ID = ' . $tambol_id)->one()->DISTRICT_NAME;
                    $province = str_replace(' ', '', $province);
                    $amphur = str_replace(' ', '', $amphur);
                    $tambon = str_replace(' ', '', $tambon);
                    $address = "ตำบล ".$tambon." อำเภอ ".$amphur." จังหวัด ".$province;
                    return $address;
                },
            ],
            ['attribute' => 'attachfile',
                'label' => 'ไฟล์แนบ',
                'contentOptions' => [ 'style' => 'width:5%', 'class' => 'text-center'],
                'format' => 'html',
                'value' => function ($model) {
                    if($model->attachfile != null){
                        return $model->getAttachFile($model->person->idperson, $model->attachfile);
                    }else{
                        return "<code>ไม่มี</code>";
                    }
                },
            ],
            //'year',
            //'remark',
            //'attachfile',

            ['class' => 'kartik\grid\ActionColumn',
                'header' => '',
                'template' => '{update}&nbsp{delete}',
            ],
        ],
        'resizableColumns' => false,
        'responsiveWrap' => false,
    ]); ?>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-product-hunt"></i>&nbsp;<?= $this->title; ?></h3>
    </div>
    <div class="panel-body">
        <?php
        $items = [
            [
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; ลำดับสมณศักดิ์ทั้งหมด',
                'content' => $content,
                'active' => true,
            ],
            ['label'=>'<i class="fa fa-plus"></i>&nbsp; เพิ่มลำดับสมณศักดิ์', 'url' => Url::to(['create'])]
        ];

        echo TabsX::widget([
            'items' => $items,
            'position' => TabsX::POS_ABOVE,
            'align' => TabsX::ALIGN_LEFT,
            'bordered' => true,
            'encodeLabels' => false
        ]);

        ?>
    </div>
</div>