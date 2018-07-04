<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childfound */
?>
<div class="childfound-update">

    <?= $this->render('_form', [
        'model' => $model,
        'child' => $child,
    ]) ?>

</div>
