<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Spreventivemeasure;

/* @var $this yii\web\View */
/* @var $model backend\modules\osh\models\Oshpreventivemeasure */
/* @var $form yii\widgets\ActiveForm */

IF(ISSET($_POST['id']))
    $model->oshinjury_id=$_POST['id'];
?>

<div class="oshpreventivemeasure-form">

<?php $form = ActiveForm::begin(); ?>
<div class='row'> 
<div class="col-md-6">
	<?= $form->field($model, 'oshinjury_id')->textInput(['maxlength' => true,'readonly' => true]) ?>
</div>
<div class="col-md-6">
	<?= $form->field($model, 'preventivemeasure_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Spreventivemeasure::find()->all(),'id','preventivemeasure'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select measure',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>  
</div>
</div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
