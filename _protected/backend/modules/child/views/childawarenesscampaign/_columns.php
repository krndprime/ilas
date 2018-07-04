<?php
use yii\helpers\Url;

return [
    // [
    //     'class' => 'kartik\grid\CheckboxColumn',
    //     'width' => '20px',
    // ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'topic',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'startDate',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'endDate',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'targetGroup_id',
        'value'=>'targetGroup.group',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'expectedNumberOfParticipants',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'geosector_id',
        'value'=>'geosector.sector',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'orgernisor_id',
        'value'=>'orgernisor.organiser',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   