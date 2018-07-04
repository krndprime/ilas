<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sbargainingagreementstatus */
?>
<div class="sbargainingagreementstatus-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'status',
        ],
    ]) ?>

</div>
