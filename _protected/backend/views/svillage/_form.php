<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Svillage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="svillage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'village')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cell_id')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
