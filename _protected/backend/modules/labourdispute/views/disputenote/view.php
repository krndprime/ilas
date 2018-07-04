<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\labourdispute\models\Disputenote */
?>
<div class="disputenote-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'case_id',
            'summoningDate',
            'note',
            'nextSummoningDate',
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
