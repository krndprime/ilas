<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Scell */
?>
<div class="scell-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cell',
            'sector_id',
        ],
    ]) ?>

</div>
