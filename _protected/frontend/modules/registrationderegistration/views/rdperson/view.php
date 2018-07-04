<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdperson */
?>
<div class="rdperson-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'document_id',
            'label'=>'Document type',
            'value'=>$model->document->documenttype,            
            ],
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'country_id',
            'label'=>'Country',
            'value'=>$model->country->cc_description,            
            ],
            [
            'class'=>'\kartik\grid\DataColumn',
            'attribute'=>'nid',
            'label'=>'Document number',
            'value'=>$model->nid,            
            ],
            'firstName',
            'lastName',
            'middleName',
            'dateOfBirth',
            'sex_id',
            'village_id',
            'phone',
            'email:email',
            'rssbNumber',
       
        ],
    ]) ?>

</div>
