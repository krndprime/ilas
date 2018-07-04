<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Schildussdaction */
?>
<div class="schildussdaction-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'action',
        ],
    ]) ?>

</div>
