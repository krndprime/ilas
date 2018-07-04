<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Sisco08level4;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\models\Ssex;
use backend\models\Sprovince;
use backend\models\Sdistrict;
use backend\models\Sgeosector;
use backend\models\Scell;
use backend\models\Svillage;
use backend\models\Sdocumenttype;
use backend\models\Scountrycodeiso3166;

/* @var $this yii\web\View */
/* @var $model frontend\modules\labourdispute\models\Disputecaseopenindividual */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disputecaseopenindividual-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class='row'>
    <div class="col-md-6">
    <?= $form->field($model, 'description')->textInput() ?>        
    </div>
    </div>

    <!-- <div class='row'>
    <div class="col-md-4">
    <?= $form->field($model, 'employee_id')->textInput() ?>        
    </div>
    </div> -->

    <fieldset class="scheduler-border">
 <legend class="scheduler-border" >Employee information</legend>
 <div class='row'>
<div class="col-md-4">
    <?= $form->field($person, 'document_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sdocumenttype::find()->all(),'id','documenttype'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select document type',
                                'onchange'=>'

                                // To get dropdownlist for courses

                                   var id = document.getElementById("rdperson-document_id").value;
                                   if(id == 1){
                                    $("#nid" ).show();
                                    $("#passport" ).hide();
                                    $("#document" ).hide();
                                   }
                                   else if(id == 2){
                                    $("#passport" ).show();
                                    $("#nid" ).hide();                                   
                                    $("#document" ).hide();
                                   }
                                    else{
                                    $("#nid" ).hide();
                                    $("#passport" ).hide();
                                    $("#document" ).show();
                                   }
                                    
                                    $.post("'.Url::to(['../rdperson/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                         $("select#" ).html(data);
                                    });'                                 
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>
     </div>

 <div id='nid' style='display:none'>    
        <div class="col-md-4">
         <?= $form->field($person, 'nid')->textInput(
                    [
                    'maxlength' => true,
                    'onchange'=>'   
                        $.post("'.Url::to(['../registrationderegistration/rdperson/lists', 'id'=> '']).'"+$(this).val(),function(data){
                            if(data == 0 ){
                                document.getElementById("person").style.display = "block";
                                document.getElementById("vname").style.display = "none";
                                document.getElementById("country").style.display = "block"; 

                            }else{

                                document.getElementById("person").style.display = "none"; 
                                document.getElementById("vname").style.display = "block";
                                document.getElementById("rdperson-v_name").value = data;
                                document.getElementById("country").style.display = "none";
                            }
                        });'
                    ]);
            ?>


 </div>
    </div>

    <div id='passport' style='display:none'>    
        <div class="col-md-4">
        <?= $form->field($person, 'passport')->textInput(
                    [
                    'maxlength' => true,
                    'onchange'=>'   
                        $.post("'.Url::to(['../registrationderegistration/rdperson/lists', 'id'=> '']).'"+$(this).val(),function(data){
                            if(data == 0 ){
                                document.getElementById("person").style.display = "block";
                                document.getElementById("vname").style.display = "none"; 
                                document.getElementById("country").style.display = "block"; 

                            }else{

                                document.getElementById("person").style.display = "none"; 
                                document.getElementById("vname").style.display = "block";
                                document.getElementById("rdperson-v_name").value = data;
                                document.getElementById("country").style.display = "none"; 
                            }
                        });'
                    ]);
            ?>            
        </div>
    </div>
    <div id='document' style='display:block'>    
        <div class="col-md-4">
        <?= $form->field($person, 'documentnumber')->textInput(['maxlength' => true]) ?>            
        </div>
    </div>


 <div class="col-md-4" id='vname' style='display:none'> 
  <?= $form->field($person, 'v_name')->textInput(['maxlength' => true,'readonly' => true]) ?>    
 </div>

<div id='country' style='display:none'> 
 <div class="col-md-4">
    <?= $form->field($person, 'country_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Scountrycodeiso3166::find()->all(),'id','cc_description'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select document type',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>
      </div>
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
 <div class="col-md-4" id='province' style='display:block'>
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















<fieldset class="scheduler-border">
 <legend class="scheduler-border" >Employment information</legend>
    <div class='row'>
    <div class="col-md-4"> 
    <?= $form->field($model, 'employer_id')->widget(select2::classname(),[
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
    <div class="col-md-4">  
    <?= $form->field($model, 'experienceInThisEstablishment')->textInput() ?>      
    </div>
    </div>

    <div class='row'>
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
    <div class="col-md-4">   
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

<fieldset class="scheduler-border">
 <legend class="scheduler-border" >Case information</legend>
    <div class='row'>
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
    <div class="col-md-8">   
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