<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdemployerecosector */
?>
<div class="rdemployerecosector-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'employer_id',
            'ecosector_id',
            'mainecosector_id',
            'startDate',
        ],
    ]) ?>

</div>
