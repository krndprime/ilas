<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\labourdispute\models\Disputecaseopenindividual */
?>
<div class="disputecaseopenindividual-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'description:ntext',
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
            'submissionDate',
            'observation:ntext',
        //     'createdOn',
        //     'deletedFlag',
        //     'deletedBy',
        //     'deletedOn',
        //     'deleteReason:ntext',
        //     'updatedBy',
        //     'updatedOn',
        ],
    ]) ?>

</div>
