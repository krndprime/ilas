<?php
use yii\helpers\Url;

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
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'startEmploymentYear',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'startEmploymentQuarter',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'agegroup',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'employeeProvince',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'employeeDistrict',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'employeeGeosector',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'employeeCell',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'employeeVillage',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'employerType',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'employerProvice',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'employerDistrict',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'employerGeosector',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'employerCell',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'employerVillage',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'ownership',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'ecosector',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'employerStatus',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'closingYear',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'closingMonth',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'occupation',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'experienceagegroup',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'numberOfEmployer',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'numberOfFemaleEmployee',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'numberOfMaleEmployee',
     ],
//    [
//        'class' => 'kartik\grid\ActionColumn',
//        'dropdown' => false,
//        'vAlign'=>'middle',
//        'urlCreator' => function($action, $model, $key, $index) { 
//                return Url::to([$action,'id'=>$key]);
//        },
//        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
//        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
//        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
//                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
//                          'data-request-method'=>'post',
//                          'data-toggle'=>'tooltip',
//                          'data-confirm-title'=>'Are you sure?',
//                          'data-confirm-message'=>'Are you sure want to delete this item'], 
//    ],

];   