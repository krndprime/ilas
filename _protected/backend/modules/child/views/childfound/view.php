<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childfound */
?>
<div class="childfound-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'child_id',
            'foundVillage_id',
            'location',
            'createdBy',
            'createdOn',
            'deletedFlag',
            'deletedBy',
            'deletedOn',
            'deleteReason:ntext',
            'updatedBy',
            'updatedOn',
        ],
    ]) ?>

</div>
