<?php

use kartik\tabs\TabsX;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

$this->title = 'การอบรม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-trans-index">

    <?php $content = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'showOnEmpty' => true,
        'summary' => '',
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn', 'header' => '',],

            //'id',
            //'idperson',
            //'training_id',
            [
                'attribute' => 'training_id',
                'filter' => ArrayHelper::map(\app\models\Training::find()->all(), 'idtraining', 'trainingname'),
                'value' => function($model){
                    return $model->training->trainingname;
                }
            ],
            'trainingdate',
            'trainingby',
            //'others',
            //'attachfile',

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
        <h3 class="panel-title"><i class="fa fa-bandcamp"></i>&nbsp;<?= $this->title; ?></h3>
    </div>
    <div class="panel-body">
        <?php
        $items = [
            [
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; การอบรมทั้งหมด',
                'content' => $content,
                'active' => true,
            ],
            ['label'=>'<i class="fa fa-plus"></i>&nbsp; เพิ่มประวัติการอบรม', 'url' => Url::to(['create'])]
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