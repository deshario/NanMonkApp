<?php

use kartik\tabs\TabsX;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HobbyTransSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ความสามมารถพิเศษ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hobby-trans-index">

    <?php $content = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'showOnEmpty' => false,
        'summary' => '',
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn', 'header' => '',],

            //'id',
            //'idperson',
            //'idhobby',
            [
                'attribute' => 'idhobby',
                'filter' => ArrayHelper::map(\app\models\Hobby::find()->all(), 'idhobby', 'hobbytype'),
                'value' => function($model){
                    return $model->hobby->hobbytype;
                }
            ],
            'others',

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
        <h3 class="panel-title"><i class="fa fa-list"></i>&nbsp;<?= $this->title; ?></h3>
    </div>
    <div class="panel-body">
        <?php
        $items = [
            [
                'label' => '<i class="fa fa-envelope-o"></i>&nbsp; ความสามมารถพิเศษทั้งหมด',
                'content' => $content,
                'active' => true,
            ],
            ['label'=>'<i class="fa fa-plus"></i>&nbsp; เพิ่มความสามมารถพิเศษ', 'url' => Url::to(['create'])]
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