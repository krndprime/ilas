<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Schildtargetgroup */
?>
<div class="schildtargetgroup-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'group',
        ],
    ]) ?>

</div>
