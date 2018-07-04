<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childawarenesscampaign */
?>
<div class="childawarenesscampaign-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'topic',
            'startDate',
            'endDate',
            [            
            'label'=>'Target group',
            'value'=>$model->targetGroup->group,            
            ],
            'expectedNumberOfParticipants',
            [            
            'label'=>'Sector',
            'value'=>$model->geosector->sector,            
            ],
            [            
            'label'=>'Orgernisor',
            'value'=>$model->orgernisor->organiser,            
            ],
        ],
    ]) ?>

</div>
