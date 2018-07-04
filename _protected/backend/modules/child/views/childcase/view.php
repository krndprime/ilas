<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childcase */
?>
<div class="childcase-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'childEmployment_id',
            [
            'attribute'=>'childEmployment_id',
            'label'=>'child firstname',
            'value'=>$model->childEmployment->child->childFirstName, 
            ],
            [
            'attribute'=>'childEmployment_id',
            'label'=>'child lastname',
            'value'=>$model->childEmployment->child->childLastName, 
            ],
            [
            'attribute'=>'childEmployment_id',
            'label'=>'Establishment',
            'value'=>$model->childEmployment->formalemployer->companyName, 
            ],
            [
            'label'=>'Child labour form',
            'value'=>$model->childLabourForm->form,            
            ],
            [
            'label'=>'Child labour type',
            'value'=>$model->childLabourType->type,            
            ],
            [
            'label'=>'Child case status',
            'value'=>$model->caseStatus->status,            
            ],
            [
            'label'=>'Action taken',
            'value'=>$model->actionTaken->action,            
            ],
            'recommendation:ntext',
            [
            'label'=>'Sanction',
            'value'=>$model->sanction->sanction,            
            ],
            'fineAmount',
            'reportingDate',
            'actionTakenDate',
            [
            'label'=>'USSD reporting',
            'value'=>$model->ussd->childNames,            
            ],
            // 'createdBy',
            // 'createdOn',
        ],
    ]) ?>

</div>
