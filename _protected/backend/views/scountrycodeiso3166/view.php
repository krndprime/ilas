<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Scountrycodeiso3166 */
?>
<div class="scountrycodeiso3166-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cc_iso3166',
            'cc_description',
            'position',
            'fk_continent_region',
        ],
    ]) ?>

</div>
