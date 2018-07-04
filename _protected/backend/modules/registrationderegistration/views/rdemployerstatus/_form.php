<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\models\Semployerstatus;

/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdemployerstatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rdemployerstatus-form">

    <?php $form = ActiveForm::begin(); ?>

 <div class='row'> 
 <div class="col-md-4">
 <?= $form->field($model, 'employer_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Rdemployer::find()->all(),'id','companyName'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select establishment',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>  
 </div>
 <div class="col-md-4"> 
 <?= $form->field($model, 'employerStatus_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Semployerstatus::find()->all(),'id','status'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select status',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?> 
 </div>
 <div class="col-md-4"> 
  <?= $form->field($model, 'statusEffectiveDate')->widget(
        DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
        // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
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
