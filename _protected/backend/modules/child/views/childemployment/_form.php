<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\modules\child\models\Child;
use backend\models\Sisco08level4;
use backend\models\Semployertype;
use backend\modules\child\models\Childemployer;


/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childemployment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="childemployment-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <fieldset class="scheduler-border">
 <legend class="scheduler-border" >Child employment</legend>
    <div class='row'>
    <div class="col-md-4">
     <?= $form->field($model, 'employerType_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Semployertype::find()->where(['IN','id',[1,8]])->all(),'id','type'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select child',
                                'onchange'=>'

                                // To get dropdownlist for courses

                                   var id = document.getElementById("childemployment-employertype_id").value;
                                   if(id == 1){
                                    $("#informal" ).show();
                                    $("#formal" ).hide();

                                   }else{
                                    $("#informal" ).hide();
                                    $("#formal" ).show();
                                   }
                                    
                                    $.post("'.Url::to(['cb-indicators/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                         $("select#plans-idindicator" ).html(data);
                                    });'
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]);
       
                            ?>    
    </div> 
    <div class="col-md-4" id='informal' style='display:block'> 
       <?= $form->field($model, 'employer_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Childemployer::find()->all(),'id','firstName'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select employer',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>         
    </div>
    <div class="col-md-4" id='formal' style='display:none'> 
       <?= $form->field($model, 'employer_idd')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Rdemployer::find()->all(),'id','companyName'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select employer',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>         
    </div>
    
     <div class="col-md-4">
     <?= $form->field($model, 'child_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Child::find()->all(),'id','childFirstName'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select child name',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>      
    </div>
    </div>

    <div class='row'>
     <div class="col-md-6"> 
     <?= $form->field($model, 'occupation_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sisco08level4::find()->all(),'id','occupation'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select occupation',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>       
    </div>       
    <div class="col-md-6">
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
    </div>

    <div class='row'>
     <div class="col-md-6"> 
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
