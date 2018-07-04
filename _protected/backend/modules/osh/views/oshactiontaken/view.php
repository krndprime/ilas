<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\osh\models\Oshactiontaken */
?>
<div class="oshactiontaken-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'oshinjury_id',
            'actiontaken_id',
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
