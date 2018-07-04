<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Schildlabourform */
?>
<div class="schildlabourform-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'form',
        ],
    ]) ?>

</div>
