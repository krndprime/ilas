<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\inspection\models\InspectionItem */
?>
<div class="inspection-item-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'item',
        ],
    ]) ?>

</div>
