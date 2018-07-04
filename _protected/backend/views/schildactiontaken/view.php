<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Schildactiontaken */
?>
<div class="schildactiontaken-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'action',
        ],
    ]) ?>

</div>
