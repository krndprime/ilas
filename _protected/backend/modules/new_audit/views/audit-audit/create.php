<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditAudit */
//echo $_POST['id'];
?>
<div class="audit-audit-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
