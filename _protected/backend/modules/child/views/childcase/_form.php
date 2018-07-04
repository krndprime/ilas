<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
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
use backend\modules\child\models\Childemployer;
use backend\modules\registrationderegistration\models\Rdemployer;


//;running noneho

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childcase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="childcase-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

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
                 <?= $form->field($employment, 'employerType_id')->widget(select2::classname(),[
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
                   <?= $form->field($employment, 'employer_id')->widget(select2::classname(),[
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
                   <?= $form->field($employment, 'employer_idd')->widget(select2::classname(),[
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
            </div>






        <!-- Creating establishment once it is not existing -->

        <div id='establishment' style='display:none'>
            

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
               <?= $form->field($model, 'childLabourForm_id')->widget(select2::classname(),[
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
              <?= $form->field($model, 'childLabourType_id')->widget(select2::classname(),[
                                    'data'=>ArrayHelper::map(Schildlabourtype::find()->all(),'id','type'),
                                    'theme' => Select2::THEME_KRAJEE, 
                                    'options'=>[
                                        'placeholder'=>'Select labour activity',                                
                                    ],
                                    'language' => 'en',
                                    'pluginOptions'=>['alloweClear'=>true],
                                    ]); 
                                    ?>    
            </div>
            <div class="col-md-4"> 
            <?= $form->field($model, 'caseStatus_id')->widget(select2::classname(),[
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
               <?= $form->field($model, 'actionTaken_id')->widget(select2::classname(),[
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
            <?= $form->field($model, 'actionTakenDate')->widget(
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
             <?= $form->field($model, 'sanction_id')->widget(select2::classname(),[
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
              <?= $form->field($model, 'fineAmount')->textInput() ?>  
            </div>
            <div class="col-md-4">
              <?= $form->field($model, 'reportingDate')->widget(
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
            <?= $form->field($model, 'ussd_id')->widget(select2::classname(),[
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
            <?= $form->field($model, 'recommendation')->textarea(['rows' => 6]) ?>      
            </div>
            </div>
            </fieldset>

            <!-- End Creating case  -->

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
