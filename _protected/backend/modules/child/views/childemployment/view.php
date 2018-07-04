<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childemployment */
?>
<div class="childemployment-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [            
            'label'=>'Employer type',
            'value'=>$model->employerType->type,            
            ],
            [            
            'label'=>'Employer',
            'value'=>$model->childemployer->firstName,            
            ],
            [            
            'label'=>'Child name',
            'value'=>$model->child->childFirstName,            
            ],
            [            
            'label'=>'Occupation',
            'value'=>$model->occupation->occupation,            
            ],
            'startDate',
            'endDate',
        
        ],
    ]) ?>

</div>
