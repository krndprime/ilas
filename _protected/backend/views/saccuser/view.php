<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Saccuser */
?>
<div class="saccuser-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'accuser',
        ],
    ]) ?>

</div>
