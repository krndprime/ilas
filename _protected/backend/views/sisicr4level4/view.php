<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sisicr4level4 */
?>
<div class="sisicr4level4-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'ecosector',
        ],
    ]) ?>

</div>
