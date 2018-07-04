<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\osh\models\Oshinjuryopenn */
?>
<div class="oshinjuryopenn-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'employee_id',
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'employee_id',
            'label'=>'Rmployee first name',
            'value'=>$model->employee->firstName,            
            ],
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'employee_id',
            'label'=>'Rmployee last name',
            'value'=>$model->employee->lastName,            
            ],
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'employer_id',
            'label'=>'Establishment',
            'value'=>$model->employer->companyName,            
            ],
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'occupation_id',
            // 'label'=>'Establishment',
            'value'=>$model->occupation->occupation,            
            ],
            'experienceInThisEstablishment',
            'startDate',
            'endDate',
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'injuryType_id',
            // 'label'=>'Establishment',
            'value'=>$model->injuryType->type,            
            ],
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'frequency_id',
            // 'label'=>'Establishment',
            'value'=>$model->frequency->frequency,            
            ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'desease_id',
            // // 'label'=>'Establishment',
            // 'value'=>$model->desease->desease,            
            // ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'accident_id',
            // // 'label'=>'Establishment',
            // 'value'=>$model->accident->accident,            
            // ],
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'injuryCategory_id',
            // 'label'=>'Establishment',
            'value'=>$model->injuryCategory->category,            
            ],
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'partOfTheBody_id',
            // 'label'=>'Establishment',
            'value'=>$model->partOfTheBody->partOfTheBody,            
            ],
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'cause_id',
            // 'label'=>'Establishment',
            'value'=>$model->cause->cause,            
            ],
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'oshTrainingRelatedToOccupation_id',
            // 'label'=>'Establishment',
            'value'=>$model->oshTrainingRelatedToOccupation->noyes,            
            ],
            'injuryDate',
            'returnToWorkDate',
            'observation:ntext',
            // 'createdOn',
            // 'deletedFlag',
            // 'deletedBy',
            // 'deletedOn',
            // 'deleteReason:ntext',
            // 'updatedBy',
            // 'updatedOn',
        ],
    ]) ?>

</div>
