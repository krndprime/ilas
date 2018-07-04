<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sinjurycategory */
?>
<div class="sinjurycategory-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category',
        ],
    ]) ?>

</div>
