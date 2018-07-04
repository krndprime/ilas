<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sregion */
?>
<div class="sregion-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'village',
            'cell',
            'sector',
            'district',
            'province',
        ],
    ]) ?>

</div>
