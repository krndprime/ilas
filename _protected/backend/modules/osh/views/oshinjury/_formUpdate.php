<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Sinjurytype;
use backend\models\Sfrequency;
use backend\models\Sdesease;
use backend\models\Sinjurycategory;
use backend\models\Sinjurypartofthebody;
use backend\models\Sinjurycause;
use backend\models\Spreventivemeasure;
use backend\models\Snoyes;
use backend\models\Sinjuryfirstaid;

/* @var $this yii\web\View */
/* @var $model backend\modules\osh\models\Oshinjury */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oshinjury-form">

    <?php $form = ActiveForm::begin(); ?>

    <fieldset class="scheduler-border">
 <legend class="scheduler-border" >OSH related information</legend>
    <div class='row'>    
    <div class="col-md-4">
    <?= $form->field($model, 'injuryType_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sinjurytype::find()->all(),'id','type'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select type',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>        
    </div>
    <div class="col-md-4"> 
    <?= $form->field($model, 'frequency_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sfrequency::find()->all(),'id','frequency'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select frequency',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>      
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'desease_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sdesease::find()->all(),'id','desease'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select desease',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>         
    </div>
    </div>

    <div class='row'>    
    <div class="col-md-4">
    <?= $form->field($model, 'injuryCategory_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sinjurycategory::find()->all(),'id','category'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select category',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>       
    </div>
    <div class="col-md-4">
     <?= $form->field($model, 'partOfTheBody_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sinjurypartofthebody::find()->all(),'id','partOfTheBody'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select part of the body',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>      
    </div>
    <div class="col-md-4">
     <?= $form->field($model, 'cause_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sinjurycause::find()->all(),'id','cause'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select cause',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>      
    </div>    
    </div>

    <div class='row'> 
    <div class="col-md-4">
    <?= $form->field($model, 'preventivemeasure')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Spreventivemeasure::find()->all(),'id','preventivemeasure'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select measures',
                                'multiple' => true,                              
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>        
    </div>   
    <div class="col-md-4">
    <?= $form->field($model, 'oshTrainingRelatedToOccupation_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Snoyes::find()->all(),'id','noyes'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select the answer',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>        
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'injuryDate')->widget(
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

    <div class='row'>
    <div class="col-md-4"> 
    <?= $form->field($model, 'returnToWorkDate')->widget(
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
    <div class="col-md-4">
    <?= $form->field($model, 'actiontaken')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sinjuryfirstaid::find()->all(),'id','firstAid'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select first aid given',
                                'multiple' => true,                              
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>         
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'affiliatedToRssb_id')->widget(select2::classname(),[
                        'data'=>ArrayHelper::map(Snoyes::find()->all(),'id','noyes'),
                        'theme' => Select2::THEME_KRAJEE, 
                        'options'=>[
                            'placeholder'=>'Select province',
                            'onchange'=>'
                               var id = document.getElementById("oshinjury-affiliatedtorssb_id").value;
                               if(id == 2){
                                $("#number" ).show();
                               }
                                else{
                                $("#number" ).hide();
                               
                                };'
                        ],
                        'language' => 'en',
                        'pluginOptions'=>['alloweClear'=>true],
                        ]);
        ?>
       
    </div>    
    </div>
    <div class='row'>
    <div class="col-md-4" id='number' style='display:none'> 
    <?= $form->field($model, 'rssbNumber')->textInput(['maxlength' => true]) ?>       
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?>        
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
