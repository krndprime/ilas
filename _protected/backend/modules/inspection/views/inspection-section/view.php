<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\inspection\models\InspectionSection */
?>
<div class="inspection-section-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'section',
        ],
    ]) ?>

</div>
