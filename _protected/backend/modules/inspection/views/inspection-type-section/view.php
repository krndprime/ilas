<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\inspection\models\InspectionTypeSection */
?>
<div class="inspection-type-section-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'inspection_id',
            'section_id',
            'created_by',
            'created_on',
        ],
    ]) ?>

</div>
