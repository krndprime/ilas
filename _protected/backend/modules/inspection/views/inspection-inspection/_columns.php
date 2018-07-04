<?php
use yii\helpers\Url;
use yii\helpers\Html;

return [
//    [
//        'class' => 'kartik\grid\CheckboxColumn',
//        'width' => '20px',
//    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'year',
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'month',
//        'format' => 'raw',
//        'value' => function ($data){
//                        return date('F', mktime(0, 0, 0,$data['month'], 10));
//        },
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'name',
        'format' => 'raw',
        'value'=>function ($data) {
                   $eid=$data['id'];
                   return Html::a(
                           $data['name'],
                           ["inspection-answer/establishment?id=$eid"]);
                 },
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'created_by',
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'created_on',
//    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'status',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{view}',
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