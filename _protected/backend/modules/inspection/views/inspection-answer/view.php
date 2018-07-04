<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\inspection\models\InspectionAnswer */
?>
<div class="inspection-answer-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'inspection_id',
            'establishment_id',
            'question_id',
            'option_id',
            'answer:ntext',
            'created_by',
            'created_on',
        ],
    ]) ?>

</div>
