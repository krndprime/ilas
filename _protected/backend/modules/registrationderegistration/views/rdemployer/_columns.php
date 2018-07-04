<?php
use yii\helpers\Url;
use yii\helpers\Html;

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
        'attribute'=>'companyName',
    ],
    [
        'attribute'=>'employerType_id',
        'value'=>'employerType.type',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'nida',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'openingDate',
    ],
    [
        'attribute'=>'registrationAuthority_id',
        'value'=>'registrationAuthority.registrationauthority',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'tin',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'rssbNumber',
    // ],
    [
        'attribute'=>'ownership_id',
        'value'=>'ownership.ownership',
    ],

    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'createdBy',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'createdOn',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'deletedFlag',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'deletedBy',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'deletedOn',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'deleteReason',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updatedBy',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'updatedOn',
    // ],
    [
        'class' => 'yii\grid\ActionColumn',
        'template'=>'{update}',
        'buttons' => [
        'update' => function ($url, $model) {

        return Html::a('<span class="glyphicon glyphicon-">create branch</span>', Yii::$app->urlManager->createUrl(['registrationderegistration/rdemployer/branch','id' => $model->id]), [
                        'title' => Yii::t('yii', 'Edit'),
                        // 'role'=>'modal-remote',
                        // 'title'=>'Reply',
                        // 'data-toggle'=>'tooltip',
                        'data-pjax' => '0',
                      ]);                              
                    },

        ],
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'template'=>'{view}',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['data-pjax' => 0,'title'=>'View','data-toggle'=>'tooltip'],
        // 'updateOptions'=>['data-pjax' => 0,'title'=>'Update', 'data-toggle'=>'tooltip'],
        // 'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
        //                   'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
        //                   'data-request-method'=>'post',
        //                   'data-toggle'=>'tooltip',
        //                   'data-confirm-title'=>'Are you sure?',
        //                   'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

    

];   