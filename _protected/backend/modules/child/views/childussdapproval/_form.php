<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Schildussdaction;


use backend\modules\child\models\Childemployment;
use backend\models\Schildlabourform;
use backend\models\Schildlabourtype;
use backend\models\Scasestatus;
use backend\models\Schildactiontaken;
use backend\models\Ssanction;
use backend\modules\child\models\Childussd;
use backend\modules\child\models\Child;

use backend\models\Ssex;
use backend\models\Sedulevel;
use backend\models\Svillage;
use backend\models\Sprovince;
use backend\models\Sdistrict;
use backend\models\Sgeosector;
use backend\models\Srelationship;
use backend\models\Scell;

use backend\modules\registrationderegistration\models\Rdemployer2;
use backend\models\Sisco08level4;


use backend\models\Semployertype;
use backend\models\Semployerstatus;
use backend\models\SregistrationAuthority;
use backend\models\Sownership;
use backend\models\Sisicr4level4;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Smainecosector;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childussdapproval */
/* @var $form yii\widgets\ActiveForm */
?>

<font color="0000FF"><h4>Report on child labour case of CHILD: <?= $dataFromUSSD->childNames.' and EMPLOYER: '.$dataFromUSSD->employerNames;?></h4></font></br>
<hr>

<div class="childussdapproval-form">

    <?php $form = ActiveForm::begin(); ?>
 <fieldset class="scheduler-border">
    <legend class="scheduler-border" >USSD case reporting</legend>
    <div class='row'>
    <div class="col-md-6">
     <?= $form->field($model, 'childUssd_id')->textInput(['value'=>$dataFromUSSD->id,'readonly' => true]) ?>  
    </div>    
    <div class="col-md-6">
    <?= $form->field($model, 'childUssdAction_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Schildussdaction::find()->all(),'id','action'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select action', 
                                'onchange'=>' 
                                   var id = document.getElementById("childussdapproval-childussdaction_id").value;
                                   if(id == 2){
                                    $("#observation" ).show();
                                    $("#childcase" ).hide();

                                    }else{

                                    $("#observation" ).hide();
                                    $("#childcase" ).show();
                                    }'                               
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>
    </div>
    </div>
    <div id='observation' style='display:none'>
    <div class='row'>
    <div class="col-md-6">
    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
    </div>
    </div> 
    </div>
    </fieldset>





    <div id='childcase' style='display:none'>
    <fieldset class="scheduler-border">
    <legend class="scheduler-border" >Child case details</legend>

    <!-- Verifying or Creating a child -->

<fieldset class="scheduler-border">
 <legend class="scheduler-border" >Child basic information</legend>
<div class='row'> 
<div class="col-md-4"> 
 <?= $form->field($child, 'childFirstName')->textInput(['maxlength' => true]) ?>    
 </div>  
 <div class="col-md-4">
    <?= $form->field($child, 'childMiddleName')->textInput(['maxlength' => true]) ?>        
 </div> 
 <div class="col-md-4">
 <?= $form->field($child, 'childLastName')->textInput(
            [
            'maxlength' => true,
            'onchange'=>' 

                $.post("'.Url::to(['child/lists', 'names'=> '']).'"+$(this).val()+","+$("#child-childfirstname").val(),function(data){
                    $("select#child-v_name" ).html(data);
                                                              

                    if(data == 0 ){
                        
                        document.getElementById("vname").style.display = "none"; 
                        document.getElementById("child").style.display = "block"; 
                        document.getElementById("origin").style.display = "block";

                    }else{                        
                        document.getElementById("vname").style.display = "block";
                        document.getElementById("child").style.display = "none"; 
                        document.getElementById("origin").style.display = "none"; 
                    }
                });'
            ]);
    ?>


 </div>
 <div class="col-md-4" id='vname' style='display:none'>
  <?= $form->field($child, 'v_name')->widget(select2::classname(),[
                            'data'=>Child::children(),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select child',
                                'onchange'=>'

                                // To get dropdownlist for courses

                                   var id = document.getElementById("childemployment-employer_id").value;
                                   if(id == 2){
                                    $("#course" ).show();

                                   }else{
                                    $("#course" ).hide();
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
 </div>
  <div id='child' style='display:none'>

    <div class='row'>
    <div class="col-md-4">
    <?= $form->field($child, 'dateOfBirth')->widget(
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
    <div class="col-md-4"><?= $form->field($child, 'sex_id')->widget(select2::classname(),[
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
    <div class="col-md-4">
    <?= $form->field($child, 'edulevel_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sedulevel::find()->all(),'id','level'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select education level',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>         
    </div>
    </div>
     </div>
    </fieldset>






<div id='origin' style='display:none'>
<fieldset class="scheduler-border">
 <legend class="scheduler-border" >Origin of</legend>

    <div class='row'>
    <div class="col-md-4">
     <?= $form->field($child, 'provincee_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sprovince::find()->all(),'id','province'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select province',
                                'onchange'=>'
                                    
                                    $.post("'.Url::to(['../sdistrict/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                         $("select#child-origindistrict_id" ).html(data);
                                    });'
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]);
    ?>
    </div> 
    <div class="col-md-4">
    <?= $form->field($child, 'originDistrict_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sdistrict::find()->where('province_id=0')->all(),'id','district'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select district',
                                'onchange'=>'
                                    $.post("'.Url::to(['../sgeosector/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                         $("select#child-originsector_id" ).html(data);
                                    });'
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>        
    </div>
    <div class="col-md-4">
    <?= $form->field($child, 'originSector_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sgeosector::find()->where('district_id=0')->all(),'id','sector'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select sector',
                                'onchange'=>'
                                    $.post("'.Url::to(['../scell/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                         $("select#child-origincell_id" ).html(data);
                                    });'
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>      
    </div>
    </div>



    <div class='row'> 
    <div class="col-md-4"> 
    <?= $form->field($child, 'originCell_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Scell::find()->where('sector_id=0')->all(),'id','cell'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select cell',
                                'onchange'=>'
                                    $.post("'.Url::to(['../svillage/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                         $("select#child-originvillage_id" ).html(data);
                                    });'
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>       
    </div>   
       
    <div class="col-md-4">  
    <?= $form->field($child, 'originVillage_id')->widget(select2::classname(),[
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
    </div>
    </fieldset>

    <fieldset class="scheduler-border">
     <legend class="scheduler-border" >Parent/Guardian</legend>
        <div class='row'>
        <div class="col-md-4">
         <?= $form->field($child, 'guardianNames')->textInput(['maxlength' => true]) ?>      
        </div> 
        <div class="col-md-4">
         <?= $form->field($child, 'contactPhone')->textInput(['maxlength' => true]) ?>        
        </div>
        <div class="col-md-4">
         <?= $form->field($child, 'relationship_id')->widget(select2::classname(),[
                                'data'=>ArrayHelper::map(Srelationship::find()->all(),'id','relationship'),
                                'theme' => Select2::THEME_KRAJEE, 
                                'options'=>[
                                    'placeholder'=>'Select relationship',                                
                                ],
                                'language' => 'en',
                                'pluginOptions'=>['alloweClear'=>true],
                                ]); 
                                ?>       
        </div> 
        </div>
    </fieldset>

    </div> 


    <fieldset class="scheduler-border">
     <legend class="scheduler-border" >Found in</legend>
        <div class='row'>
        <div class="col-md-4" id='province' style='display:block'>
         <?= $form->field($childfound, 'province_id')->widget(select2::classname(),[
                                'data'=>ArrayHelper::map(Sprovince::find()->all(),'id','province'),
                                'theme' => Select2::THEME_KRAJEE, 
                                'options'=>[
                                    'placeholder'=>'Select province',
                                    'onchange'=>'
                                        
                                        $.post("'.Url::to(['../sdistrict/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                             $("select#childfound-district_id" ).html(data);
                                        });'
                                ],
                                'language' => 'en',
                                'pluginOptions'=>['alloweClear'=>true],
                                ]);
        ?>
        </div>   
         <div class="col-md-4" id='district' style='display:block'>
         <?= $form->field($childfound, 'district_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(Sdistrict::find()->where('province_id=0')->all(),'id','district'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder'=>'Select district',
            'onchange'=>'
                 $.post("'.Url::to(['../sgeosector/lists', 'id'=> '']).'"+$(this).val(),function(
                 data){
                     $("select#childfound-sector_id" ).html(data);
                });'
        ],
        'language' => 'en',
        'pluginOptions'=>['alloweClear'=>true],
        ]); 
        ?>      
         </div> 
         <div class="col-md-4" id='sector' style='display:block'> 
         <?= $form->field($childfound, 'sector_id')->widget(select2::classname(),[
                                    'data'=>ArrayHelper::map(Sgeosector::find()->where('district_id=0')->all(),'id','sector'),
                                    'theme' => Select2::THEME_KRAJEE, 
                                    'options'=>[
                                        'placeholder'=>'Select sector',
                                        'onchange'=>'
                                            $.post("'.Url::to(['../scell/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                                 $("select#childfound-cell_id" ).html(data);
                                            });'
                                    ],
                                    'language' => 'en',
                                    'pluginOptions'=>['alloweClear'=>true],
                                    ]); 
                                    ?>     
         </div>
         </div>
         <div class='row'>
         <div class="col-md-4" id='cell' style='display:block'>
         <?= $form->field($childfound, 'cell_id')->widget(select2::classname(),[
                                    'data'=>ArrayHelper::map(Scell::find()->where('sector_id=0')->all(),'id','cell'),
                                    'theme' => Select2::THEME_KRAJEE, 
                                    'options'=>[
                                        'placeholder'=>'Select cell',
                                        'onchange'=>'
                                            $.post("'.Url::to(['../svillage/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                                 $("select#childfound-foundvillage_id" ).html(data);
                                            });'
                                    ],
                                    'language' => 'en',
                                    'pluginOptions'=>['alloweClear'=>true],
                                    ]); 
                                    ?>    
         </div>
         <div class="col-md-4">
        <?= $form->field($childfound, 'foundVillage_id')->widget(select2::classname(),[
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
        <div class="col-md-4"> 
        <?= $form->field($childfound, 'location')->textInput(['maxlength' => true]) ?>       
        </div>
        </div>
        </fieldset>

         <!-- End Verifying or Creating a child -->


         <!-- Verifying or creating employer -->
        <fieldset class="scheduler-border">
         <legend class="scheduler-border" >Child employment</legend>
            <div class='row'>
            <div class="col-md-4">
                <?= $form->field($employment, 'employer_id')->widget(select2::classname(),[
                            'data'=>Rdemployer2::employers(),

                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select employer',
                                'onchange'=>'

                                // To get dropdownlist for courses

                                   var id = document.getElementById("childemployment-employer_id").value;
                                   if(id == 0){
                                    $("#establishment" ).show();

                                   }else{
                                    $("#establishment" ).hide();
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
            </div>






        <!-- Creating establishment once it is not existing -->

        <div id='establishment' style='display:none'>


                 <fieldset class="scheduler-border">
                 <legend class="scheduler-border" >Basic information</legend>
                <div class='row'> 
                 <div class="col-md-4"> 
                 <?= $form->field($establishment, 'companyName')->textInput(['maxlength' => true]) ?>    
                 </div>
                 <div class="col-md-4"> 
                  <?= $form->field($establishment, 'employerType_id')->widget(select2::classname(),[
                                            'data'=>ArrayHelper::map(Semployertype::find()->all(),'id','type'),
                                            'theme' => Select2::THEME_KRAJEE, 
                                            'options'=>[
                                                'placeholder'=>'Select type', 
                                                'onchange'=>'

                                                // To get dropdownlist for courses

                                                   var id = document.getElementById("rdemployer2-employertype_id").value;
                                                   if(id == 1){
                                                    $("#registration" ).hide();
                                                    $("#tin" ).hide();
                                                   }
                                                    else{
                                                    $("#registration" ).show();
                                                    $("#tin" ).show();
                                                   }
                                                    
                                                    $.post("'.Url::to(['../sownership/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                                         $("select#rdemployer2-ownership_id" ).html(data);
                                                    });'                               
                                            ],
                                            'language' => 'en',
                                            'pluginOptions'=>['alloweClear'=>true],
                                            ]); 
                                            ?>    
                 </div>                 
                 <div class="col-md-4" id='tin' style='display:none'>  
                 <?= $form->field($establishment, 'tin')->textInput(['maxlength' => true]) ?>   
                 </div> 
                 </div>
                 <div class='row'> 
                 <div class="col-md-4"> 
                 <?= $form->field($establishment, 'rssbNumber')->textInput(['maxlength' => true]) ?>    
                 </div>
                 </div>

                 </fieldset>

                 <div id='registration' style='display:none'>
                 <fieldset class="scheduler-border">
                 <legend class="scheduler-border" >Legal status</legend>
                 <div class='row'> 
                 <div class="col-md-4">
                 <?= $form->field($establishment, 'openingDate')->widget(
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
                 <?= $form->field($establishment, 'registrationAuthority_id')->widget(select2::classname(),[
                                            'data'=>ArrayHelper::map(SregistrationAuthority::find()->all(),'id','registrationauthority'),
                                            'theme' => Select2::THEME_KRAJEE, 
                                            'options'=>[
                                                'placeholder'=>'Select authority',                                
                                            ],
                                            'language' => 'en',
                                            'pluginOptions'=>['alloweClear'=>true],
                                            ]); 
                                            ?>   
                 </div>
                 <div class="col-md-4"> 
                 <?= $form->field($establishment, 'ownership_id')->widget(select2::classname(),[
                                            'data'=>ArrayHelper::map(Sownership::find()->where('employertype_id=0')->all(),'id','ownership'),
                                            'theme' => Select2::THEME_KRAJEE, 
                                            'options'=>[
                                                'placeholder'=>'Select  ownership',                                
                                            ],
                                            'language' => 'en',
                                            'pluginOptions'=>['alloweClear'=>true],
                                            ]); 
                                            ?>  
                 </div>
                 </div>
                 </fieldset>
                 </div>

                 <!-- Establishment address -->
                 <div>

                <fieldset class="scheduler-border">
                 <legend class="scheduler-border" >Location</legend>
                <div class='row'> 
                <div class="col-md-4" id='province' style='display:block'>
                 <?= $form->field($address, 'province_id')->widget(select2::classname(),[
                                        'data'=>ArrayHelper::map(Sprovince::find()->all(),'id','province'),
                                        'theme' => Select2::THEME_KRAJEE, 
                                        'options'=>[
                                            'placeholder'=>'Select province',
                                            'onchange'=>'
                                                
                                                $.post("'.Url::to(['../sdistrict/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                                     $("select#rdemployeraddress-district_id" ).html(data);
                                                });'
                                        ],
                                        'language' => 'en',
                                        'pluginOptions'=>['alloweClear'=>true],
                                        ]);
                ?>
                </div>   
                 <div class="col-md-4" id='district' style='display:block'>
                 <?= $form->field($address, 'district_id')->widget(select2::classname(),[
                'data'=>ArrayHelper::map(Sdistrict::find()->where('province_id=0')->all(),'id','district'),
                'theme' => Select2::THEME_KRAJEE, 
                'options'=>[
                    'placeholder'=>'Select district',
                    'onchange'=>'
                         $.post("'.Url::to(['../sgeosector/lists', 'id'=> '']).'"+$(this).val(),function(
                         data){
                             $("select#rdemployeraddress-sector_id" ).html(data);
                        });'
                ],
                'language' => 'en',
                'pluginOptions'=>['alloweClear'=>true],
                ]); 
                ?>      
                 </div> 
                 <div class="col-md-4" id='sector' style='display:block'> 
                 <?= $form->field($address, 'sector_id')->widget(select2::classname(),[
                                            'data'=>ArrayHelper::map(Sgeosector::find()->where('district_id=0')->all(),'id','sector'),
                                            'theme' => Select2::THEME_KRAJEE, 
                                            'options'=>[
                                                'placeholder'=>'Select sector',
                                                'onchange'=>'
                                                    $.post("'.Url::to(['../scell/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                                         $("select#rdemployeraddress-cell_id" ).html(data);
                                                    });'
                                            ],
                                            'language' => 'en',
                                            'pluginOptions'=>['alloweClear'=>true],
                                            ]); 
                                            ?>     
                 </div> 
                </div>
                <div class='row'>
                <div class="col-md-4" id='cell' style='display:block'>
                 <?= $form->field($address, 'cell_id')->widget(select2::classname(),[
                                            'data'=>ArrayHelper::map(Scell::find()->where('sector_id=0')->all(),'id','cell'),
                                            'theme' => Select2::THEME_KRAJEE, 
                                            'options'=>[
                                                'placeholder'=>'Select cell',
                                                'onchange'=>'
                                                    $.post("'.Url::to(['../svillage/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                                         $("select#rdemployeraddress-village_id" ).html(data);
                                                    });'
                                            ],
                                            'language' => 'en',
                                            'pluginOptions'=>['alloweClear'=>true],
                                            ]); 
                                            ?>    
                 </div> 
                 <div class="col-md-4">
                 <?= $form->field($address, 'village_id')->widget(select2::classname(),[
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
                 </div>
                 </fieldset>

                 <fieldset class="scheduler-border">
                 <legend class="scheduler-border" >Address</legend>
                 <div class='row'>
                 <div class="col-md-4">  
                 <?= $form->field($address, 'physicalAddress')->textInput(['maxlength' => true]) ?>   
                 </div>
                 <div class="col-md-4">
                 <?= $form->field($address, 'emailAddress')->textInput(['maxlength' => true]) ?>     
                 </div>
                 <div class="col-md-4"> 
                 <?= $form->field($address, 'phoneNumber')->textInput(['maxlength' => true]) ?>    
                 </div>
                 
                 </div>

                 <div class='row'> 
                 <div class="col-md-4"> 
                 <?= $form->field($address, 'pobox')->textInput(['maxlength' => true]) ?>    
                 </div> 
                 </div>
                 </fieldset>
                 </div>
                 <!-- End Establishment address --> 


                 <!-- Establishment number of employee & status --> 
                 <div>
                 <fieldset class="scheduler-border">
                 <legend class="scheduler-border" >Working persons and status</legend>
                 <div class='row'>  
                 <div class="col-md-4"> 
                 <?= $form->field($employeenumbers, 'numberOfFemaleEmployee')->textInput() ?>
                 </div>
                 <div class="col-md-4"> 
                  <?= $form->field($employeenumbers, 'numberOfMaleemployee')->textInput() ?>
                 </div>
                 <div class="col-md-4"> 
                 <?= $form->field($employerstatus, 'employerStatus_id')->widget(select2::classname(),[
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
                 </div>
                 <div class='row'> 
                 <div class="col-md-4"> 
                  <?= $form->field($employerstatus, 'statusEffectiveDate')->widget(
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
                 </div>
                 <!-- End Establishment number of employee & status -->

                 <!-- Establishment economic sector --> 
                 <div>
                 <fieldset class="scheduler-border">
                 <legend class="scheduler-border" >Economic sector</legend>
                <div class='row'>
                <div class="panel panel-default">
                <div class="panel-heading"><h4><i class="glyphicon glyphicon-"></i><!-- Collective bargaining agreement --></h4></div>
                <!-- envelope -->
                <div class="panel-body">
                     <?php DynamicFormWidget::begin([
                        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                        'widgetBody' => '.container-items', // required: css class selector
                        'widgetItem' => '.item', // required: css class
                        'limit' => 10, // the maximum times, an element can be cloned (default 999)
                        'min' => 1, // 0 or 1 (default 1)
                        'insertButton' => '.add-item', // css class
                        'deleteButton' => '.remove-item', // css class
                        'model' => $modelseconomicsector[0],
                        'formId' => 'dynamic-form',
                        'formFields' => [
                            'ecosector_id',
                            'mainecosector_id',
                            'startDate',
                        ],
                    ]); ?>

                    <div class="container-items"><!-- widgetContainer -->
                    <?php foreach ($modelseconomicsector as $i => $modeleconomicsector): ?>
                        <div class="item panel panel-default"><!-- widgetBody -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Economic sector</h3>
                                <div class="pull-right">
                                    <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                    // necessary for update action.
                                    if (! $modeleconomicsector->isNewRecord) {
                                        echo Html::activeHiddenInput($modeleconomicsector, "[{$i}]id");
                                    }
                                ?> 
                                <div class='row'>            
                                </div>
                                    <div class='row'>
                                        <div class="col-md-6">
                                        <?= $form->field($modeleconomicsector, "[{$i}]ecosector_id")->dropDownList(ArrayHelper::map(Sisicr4level4::find()->all(),'id','ecosector'),[ 'prompt'=>'economic sector',
                                            'language' => 'en',
                                            ]);

                                             ?> 
                                        </div> 
                                        <div class="col-md-6">
                                        <?= $form->field($modeleconomicsector, "[{$i}]mainecosector_id")->dropDownList(ArrayHelper::map(Smainecosector::find()->all(),'id','sector'),[ 'prompt'=>'type of economic sector',
                                            'language' => 'en',
                                            ]);

                                             ?> 
                                        </div>                       
                                        <div class="col-md-6">
                                         <?= $form->field($modeleconomicsector, "[{$i}]startDate")->widget(
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
                                    </div><!-- .row -->
                 
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                            <?php DynamicFormWidget::end(); ?>
                        </div>
                    </div>        
                    </div>
                    </fieldset>    
                 </div>
                 <!-- End Establishment economic sector -->


                 <!-- Establishment representatives --> 
                 <div>
                 <fieldset class="scheduler-border">
                 <legend class="scheduler-border" >Manager</legend>
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
                <div class='row'>
                <div class="col-md-4">
                 <?= $form->field($representative, 'startDate')->widget(
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
                  <?= $form->field($representative, 'endDate')->widget(
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
                 </div>
                 <!-- End Establishment representatives -->


                      
        </div>
        </fieldset>

        <!-- End Creating establishment once it is not existing -->



        <fieldset class="scheduler-border">
         <legend class="scheduler-border" >Occupation</legend>
            <div class='row'>
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
         

         <!-- End Verifying or creating employer -->


         <!-- Creating case  -->

        <fieldset class="scheduler-border">
         <legend class="scheduler-border" >Case information</legend>
            <div class='row'>
            
            <div class="col-md-4">
               <?= $form->field($childcase, 'childLabourForm_id')->widget(select2::classname(),[
                                    'data'=>ArrayHelper::map(Schildlabourform::find()->all(),'id','form'),
                                    'theme' => Select2::THEME_KRAJEE, 
                                    'options'=>[
                                        'placeholder'=>'Select labour form',                                
                                    ],
                                    'language' => 'en',
                                    'pluginOptions'=>['alloweClear'=>true],
                                    ]); 
                                    ?>     
            </div>
            <div class="col-md-4">
              <?= $form->field($childcase, 'childLabourType_id')->widget(select2::classname(),[
                                    'data'=>ArrayHelper::map(Schildlabourtype::find()->all(),'id','type'),
                                    'theme' => Select2::THEME_KRAJEE, 
                                    'options'=>[
                                        'placeholder'=>'Select labour type',                                
                                    ],
                                    'language' => 'en',
                                    'pluginOptions'=>['alloweClear'=>true],
                                    ]); 
                                    ?>    
            </div>
            <div class="col-md-4"> 
            <?= $form->field($childcase, 'caseStatus_id')->widget(select2::classname(),[
                                    'data'=>ArrayHelper::map(Scasestatus::find()->all(),'id','status'),
                                    'theme' => Select2::THEME_KRAJEE, 
                                    'options'=>[
                                        'placeholder'=>'Select status',                                
                                    ],
                                    'language' => 'en',
                                    'pluginOptions'=>['alloweClear'=>true],
                                    ]); 
                                    ?>   
            </div>
            </div>

            <div class='row'>            
            <div class="col-md-4">
               <?= $form->field($childcase, 'actionTaken_id')->widget(select2::classname(),[
                                    'data'=>ArrayHelper::map(Schildactiontaken::find()->all(),'id','action'),
                                    'theme' => Select2::THEME_KRAJEE, 
                                    'options'=>[
                                        'placeholder'=>'Select action',                                
                                    ],
                                    'language' => 'en',
                                    'pluginOptions'=>['alloweClear'=>true],
                                    ]); 
                                    ?> 
            </div>
            <div class="col-md-4"> 
            <?= $form->field($childcase, 'actionTakenDate')->widget(
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
             <?= $form->field($childcase, 'sanction_id')->widget(select2::classname(),[
                                    'data'=>ArrayHelper::map(Ssanction::find()->all(),'id','sanction'),
                                    'theme' => Select2::THEME_KRAJEE, 
                                    'options'=>[
                                        'placeholder'=>'Select sanction', 
                                        'onchange'=>'
                                           var id = document.getElementById("childcase-sanction_id").value;
                                           if(id == "4"){
                                            $("#fine" ).show();
                                           }
                                            else{
                                            $("#fine" ).hide();                                   
                                            };'                               
                                    ],
                                    'language' => 'en',
                                    'pluginOptions'=>['alloweClear'=>true],
                                    ]); 
                                    ?>  
            </div>     
            </div>

            <div class='row'>               
            <div class="col-md-4" id='fine' style='display:none'>
              <?= $form->field($childcase, 'fineAmount')->textInput() ?>  
            </div>
            <div class="col-md-4">
              <?= $form->field($childcase, 'reportingDate')->widget(
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
            <?= $form->field($childcase, 'ussd_id')->widget(select2::classname(),[
                                    'data'=>ArrayHelper::map(Childussd::find()->all(),'id','childNames'),
                                    'theme' => Select2::THEME_KRAJEE, 
                                    'options'=>[
                                        'placeholder'=>'Select reported child',                                
                                    ],
                                    'language' => 'en',
                                    'pluginOptions'=>['alloweClear'=>true],
                                    ]); 
                                    ?>  
            </div>   
            </div>
            <div class='row'>     
            <div class="col-md-8">  
            <?= $form->field($childcase, 'recommendation')->textarea(['rows' => 6]) ?>      
            </div>
            </div>
            </fieldset>

            <!-- End Creating case  -->




   

    </fieldset>
    </div>


    
    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
