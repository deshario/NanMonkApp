<?php

use kartik\tabs\TabsX;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpecialworkTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผลงานสำคัญ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialwork-trans-index">

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
            [
                'attribute' => 'idwork',
                'filter' => ArrayHelper::map(\app\models\Specialwork::find()->all(), 'idwork', 'worktype'),
                'value' => function($model){
                    return $model->work->worktype;
                }
            ],
            'description',
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
        <h3 class="panel-title"><i class="fa fa-users"></i>&nbsp;<?= $this->title; ?></h3>
    </div>
    <div class="panel-body">
        <?php
        $items = [
            [
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; ผลงานสำคัญทั้งหมด',
                'content' => $content,
                'active' => true,
            ],
            ['label'=>'<i class="fa fa-plus"></i>&nbsp; เพิ่มผลงาน', 'url' => Url::to(['create'])]
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