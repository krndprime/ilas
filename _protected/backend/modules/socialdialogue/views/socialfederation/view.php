<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\socialdialogue\models\Socialfederation */
?>
<div class="socialfederation-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'confederation.confederation',
            'federation',
            'startDate',
            'village.village',
            'federationRepresentativeNames',
            'federationRepresentativePhone',
            
        ],
    ]) ?>

</div>
