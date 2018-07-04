<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Ssex */
?>
<div class="ssex-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sex',
        ],
    ]) ?>

</div>
