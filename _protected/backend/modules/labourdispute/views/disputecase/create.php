<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\labourdispute\models\Disputecase */

?>
<div class="disputecase-create">
    <?= $this->render('_form', [
        'model' => $model,
        'person' => $person,
        'employment' => $employment,
        'disputenote' => $disputenote,
    ]) ?>
</div>
