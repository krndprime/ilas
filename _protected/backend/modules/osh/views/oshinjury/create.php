<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\osh\models\Oshinjury */

?>
<div class="oshinjury-create">
    <?= $this->render('_form', [
        'model' => $model,
        'person' => $person,
        'employment' => $employment,
    ]) ?>
</div>
