<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Ssex;
use backend\models\Sprovince;
use backend\models\Sdistrict;
use backend\models\Sgeosector;
use backend\models\Scell;
use backend\models\Svillage;
use backend\models\Sisco08level4;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\modules\registrationderegistration\models\Rdemployment;
use backend\models\Saccuser;
use backend\models\Sdisputeactiontaken;
use backend\models\Scasestatus;
use backend\modules\socialdialogue\models\Socialtradeunion;
use backend\models\Sdisputecasetype;

/* @var $this yii\web\View */
/* @var $model backend\modules\labourdispute\models\Disputecase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disputecase-form">

    <?php $form = ActiveForm::begin(); ?>

<!-- Dispute case  -->
<fieldset class="scheduler-border">
 <legend class="scheduler-border" >Case information</legend>
 <div class='row'> 
 <div class="col-md-4">
 <?= $form->field($model, 'accuser_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Saccuser::find()->all(),'id','accuser'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select accuser',
                                'onchange'=>' 
                                   var id = document.getElementById("disputecase-accuser_id").value;
                                   if(id == 3){
                                    $("#employment" ).hide();
                                    $("#tradeunion" ).show();

                                    }else{

                                    $("#employment" ).show();
                                    $("#tradeunion" ).hide();
                                    }'
                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]);       
                            ?>
   
 </div>
  <div class="col-md-4">
 <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>    
 </div>
 <div class="col-md-4">
  <?= $form->field($model, 'submissionDate')->widget(
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
 <?= $form->field($model, 'caseStatus_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Scasestatus::find()->all(),'id','status'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select status',
                                'onchange'=>' 
                                   var id = document.getElementById("disputecase-casestatus_id").value;
                                   if(id == 1){
                                    $("#open" ).show();
                                    $("#close" ).hide();

                                    }else{

                                    $("#open" ).hide();
                                    $("#close" ).show();
                                    }'
                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]);       
                            ?> 
     
 </div> 
<div id='close' style='display:block'>
 <div class="col-md-4">
 <?= $form->field($model, 'disputeActionTaken_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sdisputeactiontaken::find()->all(),'id','actionTaken'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select action taken',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>     
 </div>
 <div class="col-md-4"> 
 <?= $form->field($model, 'settlementDate')->widget(
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

 <div id='open' style='display:none'>
 <div class="col-md-4">
 <?= $form->field($model, 'summoningDate')->widget(
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
 <?= $form->field($model, 'appearanceDate')->widget(
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
 </div>

 <div class='row'>
 <div class="col-md-4">
   <?= $form->field($model, 'casetype_id')->widget(select2::classname(),[
                                'data'=>ArrayHelper::map(Sdisputecasetype::find()->all(),'id','casetype'),
                                'theme' => Select2::THEME_KRAJEE, 
                                'options'=>[
                                    'placeholder'=>'Select case type',                                
                                ],
                                'language' => 'en',
                                'pluginOptions'=>['alloweClear'=>true],
                                ]); 
                                ?>     
 </div> 

 <div class="col-md-4"> 
 <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?>    
 </div>
 </div>
 </fieldset>
 <!-- Dispute case  -->  


<div id='employment' style='display:none'>
<!-- Verifying or Creating a person -->
 <div>
 <fieldset class="scheduler-border">
 <legend class="scheduler-border" >Employee information</legend>
 <div class='row'>    
 <div class="col-md-4">
 <?= $form->field($person, 'nid')->textInput(
            [
            'maxlength' => true,
            'onchange'=>'   
                $.post("'.Url::to(['../registrationderegistration/rdperson/lists', 'id'=> '']).'"+$(this).val(),function(data){
                    if(data == 0 ){
                        document.getElementById("person").style.display = "block";
                        document.getElementById("vname").style.display = "none"; 

                    }else{

                        document.getElementById("person").style.display = "none"; 
                        document.getElementById("vname").style.display = "block";
                        document.getElementById("rdperson-v_name").value = data;
                    }
                });

                $.post("'.Url::to(['../registrationderegistration/rdemployer/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                     $("select#rdemployment-employer_id" ).html(data);
                                });

                 $.post("'.Url::to(['../registrationderegistration/rdemployer/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                     $("select#disputecase-employer_id" ).html(data);
                                });'
            ]);
    ?>


 </div>
 <div class="col-md-4" id='vname' style='display:none'> 
  <?= $form->field($person, 'v_name')->textInput(['maxlength' => true,'readonly' => true]) ?>    
 </div>
 </div>
 <div id='person' style='display:none'>
 <div class='row' >
 <div class="col-md-4" id='firstName' style='display:block'> 
  <?= $form->field($person, 'firstName')->textInput(['maxlength' => true]) ?>    
 </div>
 <div class="col-md-4" id='lastName' style='display:block'> 
  <?= $form->field($person, 'lastName')->textInput(['maxlength' => true]) ?>    
 </div>
 <div class="col-md-4" id='middleName' style='display:block'> 
  <?= $form->field($person, 'middleName')->textInput(['maxlength' => true]) ?>    
 </div>
</div>

<div class='row'>  
 <div class="col-md-4" id='dateOfBirth' style='display:block'>
 <?= $form->field($person, 'dateOfBirth')->widget(
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
 <div class="col-md-4" id='sex' style='display:block'> 
 <?= $form->field($person, 'sex_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Ssex::find()->all(),'id','sex'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select sex',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?> 
 </div>
 <div class="col-md-3" id='province' style='display:block'>
 <?= $form->field($person, 'province_id')->widget(select2::classname(),[
                        'data'=>ArrayHelper::map(Sprovince::find()->all(),'id','province'),
                        'theme' => Select2::THEME_KRAJEE, 
                        'options'=>[
                            'placeholder'=>'Select province',
                            'onchange'=>'
                                
                                $.post("'.Url::to(['../sdistrict/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                     $("select#rdperson-district_id" ).html(data);
                                });'
                        ],
                        'language' => 'en',
                        'pluginOptions'=>['alloweClear'=>true],
                        ]);
?>
</div> 
</div>
<div class='row'>  
 <div class="col-md-4" id='district' style='display:block'>
 <?= $form->field($person, 'district_id')->widget(select2::classname(),[
'data'=>ArrayHelper::map(Sdistrict::find()->where('province_id=0')->all(),'id','district'),
'theme' => Select2::THEME_KRAJEE, 
'options'=>[
    'placeholder'=>'Select district',
    'onchange'=>'
         $.post("'.Url::to(['../sgeosector/lists', 'id'=> '']).'"+$(this).val(),function(
         data){
             $("select#rdperson-sector_id" ).html(data);
        });'
],
'language' => 'en',
'pluginOptions'=>['alloweClear'=>true],
]); 
?>      
 </div> 
 <div class="col-md-4" id='sector' style='display:block'> 
 <?= $form->field($person, 'sector_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sgeosector::find()->where('district_id=0')->all(),'id','sector'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select sector',
                                'onchange'=>'
                                    $.post("'.Url::to(['../scell/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                         $("select#rdperson-cell_id" ).html(data);
                                    });'
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>     
 </div>
 <div class="col-md-4" id='cell' style='display:block'>
 <?= $form->field($person, 'cell_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Scell::find()->where('sector_id=0')->all(),'id','cell'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select cell',
                                'onchange'=>'
                                    $.post("'.Url::to(['../svillage/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                         $("select#rdperson-village_id" ).html(data);
                                    });'
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>    
 </div>
</div>
<div class='row'>
<div class="col-md-4" id='village' style='display:block'>
<?= $form->field($person, 'village_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Svillage::find()->where('cell_id=0')->all(),'id','village'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select village',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>
 </div>    
 <div class="col-md-4" id='phoneww' style='display:block'> 
 <?= $form->field($person, 'phone')->textInput(['maxlength' => true]) ?>    
 </div> 
 <div class="col-md-4" id='emailww' style='display:block'> 
 <?= $form->field($person, 'email')->textInput(['maxlength' => true]) ?>   
 </div>
</div>
<div class='row'>
<div class="col-md-4" id='rssbNumberww' style='display:block'>
<?= $form->field($person, 'rssbNumber')->textInput(['maxlength' => true]) ?>            
</div>
</div>
</div>
</fieldset>
 </div>
<!-- End Verifying or Creating a person -->



<!-- Creating employment -->
<fieldset class="scheduler-border">
 <legend class="scheduler-border" >Employment information</legend>
   <div class='row'>
       <div class="col-md-4">
            <?= $form->field($employment, 'employer_id')->widget(select2::classname(),[
                                'data'=>ArrayHelper::map(Rdemployer::find()->where('id=0')->all(),'id','companyName'),
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
        <?= $form->field($employment, 'occupation_id')->widget(select2::classname(),[
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
        <div class="col-md-4"> 
        <?= $form->field($employment, 'experienceInThisOccupation')->textInput() ?>       
        </div>
   </div>

   <div class='row'>
        <div class="col-md-4">
        <?= $form->field($employment, 'startDate')->widget(
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
        <?= $form->field($employment, 'endDate')->widget(
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
   <!-- End Creating employment -->
   </div>


   <div id='tradeunion' style='display:none'>
   <div class='row'> 
   <div class="col-md-6">      
        <?= $form->field($model, 'tradeUnion_id')->widget(select2::classname(),[
                        'data'=>ArrayHelper::map(Socialtradeunion::find()->where(['not in','id',[1]])->all(),'id','tradeUnionName'),
                        'theme' => Select2::THEME_KRAJEE, 
                        'options'=>[
                            'placeholder'=>'Select trade union',
                            'onchange'=>'
                                
                                $.post("'.Url::to(['../socialdialogue/socialvisitedcompany/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                     $("select#disputecase-employer_id" ).html(data);
                                });'
                        ],
                        'language' => 'en',
                        'pluginOptions'=>['alloweClear'=>true],
                        ]);
            ?>
                
    </div>
        <div class="col-md-6"> 
        <?= $form->field($model, 'employer_id')->widget(select2::classname(),[
                                'data'=>ArrayHelper::map(Rdemployer::find()->where('id=0')->all(),'id','companyName'),
                                'theme' => Select2::THEME_KRAJEE, 
                                'options'=>[
                                    'placeholder'=>'Select establishment',                                
                                ],
                                'language' => 'en',
                                'pluginOptions'=>['alloweClear'=>true],
                                ]); 
                                ?>   
        </div>
    </div> 
   </div>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
