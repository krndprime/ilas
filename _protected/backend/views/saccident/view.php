<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Saccident */
?>
<div class="saccident-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'accident',
        ],
    ]) ?>

</div>
