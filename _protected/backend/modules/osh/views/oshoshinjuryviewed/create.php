<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\osh\models\Oshoshinjuryviewed */

?>
<div class="oshoshinjuryviewed-create">
    <?= $this->render('_form', [
        'model' => $model,
        'dataFromOshinjury'=>$dataFromOshinjury,
    ]) ?>
</div>
