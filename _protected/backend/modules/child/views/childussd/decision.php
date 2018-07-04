<?php

use yii\helpers\Html;
use backend\modules\child\models\Childussdapproval;

$model= new Childussdapproval();


/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childussd */

?>
<div class="childussd-create">

    <?= $this->render('../childussdapproval/create', [
        'id' => $_GET['id'],
        'model'=> $model,
    ]) ?>
</div>
