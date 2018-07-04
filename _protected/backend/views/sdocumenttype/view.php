<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sdocumenttype */
?>
<div class="sdocumenttype-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'documenttype',
        ],
    ]) ?>

</div>
