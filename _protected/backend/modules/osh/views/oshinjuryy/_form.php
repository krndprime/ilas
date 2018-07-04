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
use backend\models\Sinjurytype;
use backend\models\Sfrequency;
use backend\models\Sdesease;
use backend\models\Sinjurycategory;
use backend\models\Sinjurypartofthebody;
use backend\models\Snoyes;
use backend\models\Sinjuryfirstaid;
use backend\models\Sinjurycause;
use backend\models\Spreventivemeasure;
use backend\models\Saccident;

/* @var $this yii\web\View */
/* @var $model backend\modules\osh\models\Oshinjuryy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oshinjuryy-form">

    <?php $form = ActiveForm::begin(); ?>

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
                });'
            ]);
    ?>


 </div>
 <div class="col-md-6" id='vname' style='display:none'> 
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
</fieldset>
 </div>
<!-- End Verifying or Creating a person -->



<!-- Creating employment -->
<fieldset class="scheduler-border">
 <legend class="scheduler-border" >Employment information</legend>
   <div class='row'>
        <div class="col-md-6"> 
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
        <div class="col-md-6"> 
        <?= $form->field($employment, 'experienceInThisOccupation')->textInput() ?>       
        </div>
   </div>

   <div class='row'>
        
        <div class="col-md-6">
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
        <div class="col-md-6">
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






<!-- Inserting OSH related information -->

<fieldset class="scheduler-border">
 <legend class="scheduler-border" >OSH related information</legend>
    <div class='row'>    
    <div class="col-md-4">
    <?= $form->field($model, 'injuryType_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sinjurytype::find()->all(),'id','type'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select type',
                                'onchange'=>'
                                   var id = document.getElementById("oshinjuryy-injurytype_id").value;
                                   if(id == 1){
                                    $("#accident" ).show();
                                    $("#desease" ).hide();
                                   }
                                    else{
                                    $("#accident" ).hide();
                                    $("#desease" ).show();
                                   
                                    };'  

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
     <?= $form->field($model, 'cause_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sinjurycause::find()
                                ->where(['NOT IN','id',[1]])->all(),'id','cause'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select cause',
                                'onchange'=>'                                    
                                
                                $.post("'.Url::to(['../sdesease/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                     $("select#oshinjuryy-desease_id" ).html(data);
                                });'                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>      
    </div>     
    </div>



    <div class='row'>
    <div class="col-md-4" id='accident' style='display:block'>
    <?= $form->field($model, 'accident_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Saccident::find()->where(['NOT IN','id',[1]])->all(),'id','accident'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select accident type',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>  
    </div>
    <div class="col-md-4" id='desease' style='display:none'>
    <?= $form->field($model, 'desease_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sdesease::find()
                                ->AndWhere('injurycause_id=0')
                                ->all(),'id','desease'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select desease',                                
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>         
    </div>   
    <div class="col-md-4">
    <?= $form->field($model, 'injuryCategory_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Sinjurycategory::find()->all(),'id','category'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select category', 
                                'onchange'=>'
                                   var id = document.getElementById("oshinjuryy-injurycategory_id").value;
                                   if(id == 6){
                                    $("#returndate" ).hide();
                                   }
                                    else{
                                    $("#returndate" ).show();
                                   
                                    };'                               
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
    <div class="col-md-4" id='returndate' style='display:block'> 
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
                            'data'=>ArrayHelper::map(Sinjuryfirstaid::find()->where(['IN','id',[1, 2,3,4]])->all(),'id','firstAid'),
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
                               var id = document.getElementById("oshinjuryy-affiliatedtorssb_id").value;
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
    <!-- Inserting OSH related information -->

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
