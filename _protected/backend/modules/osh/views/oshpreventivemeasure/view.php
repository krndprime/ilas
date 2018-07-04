<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\osh\models\Oshpreventivemeasure */
?>
<div class="oshpreventivemeasure-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'oshinjury_id',
            'preventivemeasure_id',
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
