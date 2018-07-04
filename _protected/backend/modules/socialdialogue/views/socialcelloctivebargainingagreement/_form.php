<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\models\Sbargainingagreementstatus;
use backend\modules\socialdialogue\models\Socialtradeunion;

/* @var $this yii\web\View */
/* @var $model backend\modules\socialdialogue\models\Socialcelloctivebargainingagreement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="socialcelloctivebargainingagreement-form">

    <?php $form = ActiveForm::begin(); ?>   

<fieldset class="scheduler-border">
 <legend class="scheduler-border" >Agreement</legend>
<div class='row'>
    <div class="col-md-4">
    <?= $form->field($model, 'company_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Rdemployer::find()->all(),'id','companyName'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select Establishment',
                                

                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?> 
    </div>
    <div class="col-md-4">
     <?= $form->field($model, 'collectiveBargainingAgreement')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">
     <?= $form->field($model, 'bargainingagreementstatus_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sbargainingagreementstatus::find()->all(),'id','status'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select status', 

                                'onchange'=>'
                                   var id = document.getElementById("socialcelloctivebargainingagreement-bargainingagreementstatus_id").value;
                                   if(id == 1){
                                    $("#enddate" ).show();
                                    
                                   }
                                    else{
                                    $("#enddate" ).hide();   
                                    
                                   
                                    };'                                                           
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?> 
    </div>
</div>

<div class='row'>
<div class="col-md-4">
     <?= $form->field($model, 'tradeunion')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Socialtradeunion::find()->where(['NOT IN','id',[1]])->all(),'id','tradeUnionName'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select status',
                                'multiple' => true,                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?> 
    </div>
    <div class="col-md-4">
     <?= $form->field($model, 'startDate')->widget(
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
    <div class="col-md-4" id='enddate' style='display:none'>
     <?= $form->field($model, 'endDate')->widget(
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
</fieldset>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
