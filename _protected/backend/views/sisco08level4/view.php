<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sisco08level4 */
?>
<div class="sisco08level4-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'occupation',
        ],
    ]) ?>

</div>
