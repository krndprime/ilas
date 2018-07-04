<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\osh\models\Oshoshinjuryviewed */
?>
<div class="oshoshinjuryviewed-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'oshinjury_id',
            'actiontaken_id',
            'fineAmount',
            'observation:ntext',
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
