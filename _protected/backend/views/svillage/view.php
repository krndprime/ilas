<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Svillage */
?>
<div class="svillage-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'village',
            'cell_id',
        ],
    ]) ?>

</div>
