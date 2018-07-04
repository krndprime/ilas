<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sdisputeactiontaken */
?>
<div class="sdisputeactiontaken-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'actionTaken',
        ],
    ]) ?>

</div>
