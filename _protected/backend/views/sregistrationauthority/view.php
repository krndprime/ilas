<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sregistrationauthority */
?>
<div class="sregistrationauthority-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'registrationauthority',
        ],
    ]) ?>

</div>
