<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\labourdispute\models\Disputeattachment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disputeattachment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'file')->textInput() ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'createdOn')->textInput() ?>

    <?= $form->field($model, 'deletedFlag')->textInput() ?>

    <?= $form->field($model, 'deletedBy')->textInput() ?>

    <?= $form->field($model, 'deletedOn')->textInput() ?>

    <?= $form->field($model, 'deleteReason')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'updatedBy')->textInput() ?>

    <?= $form->field($model, 'updatedOn')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
