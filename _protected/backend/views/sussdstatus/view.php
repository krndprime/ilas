<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sussdstatus */
?>
<div class="sussdstatus-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'status',
        ],
    ]) ?>

</div>
