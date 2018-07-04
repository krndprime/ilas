<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sshillabourform */
?>
<div class="sshillabourform-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'form',
        ],
    ]) ?>

</div>
