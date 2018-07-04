<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childussdapproval */
?>
<div class="childussdapproval-update">

    <?= $this->render('_form', [
        'model' => $model,
        'dataFromUSSD'=>$dataFromUSSD,
    ]) ?>

</div>
