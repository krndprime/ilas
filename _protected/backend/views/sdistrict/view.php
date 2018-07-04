<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sdistrict */
?>
<div class="sdistrict-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'district',
            'province_id',
        ],
    ]) ?>

</div>
