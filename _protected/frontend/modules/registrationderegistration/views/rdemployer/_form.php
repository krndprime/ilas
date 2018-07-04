<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Response;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Semployertype;
use backend\models\Sprovince;
use backend\models\Sdistrict;
use backend\models\Sgeosector;
use backend\models\Scell;
use backend\models\Svillage;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\models\Ssex;
use backend\models\Semployerstatus;
use backend\models\SregistrationAuthority;
use backend\models\Sownership;
use backend\models\Sisicr4level4;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Smainecosector;
use backend\models\Sdocumenttype;
use backend\models\Scountrycodeiso3166;

/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdemployer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rdemployer-form">

<?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

 <fieldset class="scheduler-border">
 <legend class="scheduler-border" >Basic information</legend>
<div class='row'> 
 <div class="col-md-4"> 
 <?= $form->field($model, 'companyName')->textInput(['maxlength' => true]) ?>    
 </div>
 <div class="col-md-4"> 
  <?= $form->field($model, 'employerType_id')->widget(select2::classname(),[
                            'data'=>ArrayHelper::map(Semployertype::find()->where(['NOT IN','id',[1]])->all(),'id','type'),
                            'theme' => Select2::THEME_KRAJEE, 
                            'options'=>[
                                'placeholder'=>'Select type', 
                                'onchange'=>'

                                // To get dropdownlist for courses

                                   var id = document.getElementById("rdemployer-employertype_id").value;
                                   if(id == 1){
                                    $("#registration" ).hide();
                                    $("#tin" ).hide();
                                   }
                                    else{
                                    $("#registration" ).show();
                                    $("#tin" ).show();
                                   }
                                    
                                    $.post("'.Url::to(['../sownership/lists', 'id'=> '']).'"+$(this).val(),function(data){
                                         $("select#rdemployer-ownership_id" ).html(data);
                                    });'                               
                            ],
                            'language' => 'en',
                            'pluginOptions'=>['alloweClear'=>true],
                            ]); 
                            ?>    
 </div>
 <div class="col-md-4" id='tin' style='display:block'>  
 <?= $form->field($model, 'tin')->textInput(['maxlength' => true]) ?>   
 </div> 
 </div>
 <div class='row'> 
 <div class="col-md-4"> 
 <?= $form->field($model, 'rssbNumber')->textInput(['maxlength' => true]) ?>    
 </div>
 </div>

 </fieldset>

 <div id='registration' style='display:none'>
 <fieldset class="scheduler-border">
 <legend class="scheduler-border" >Legal status</legend>
 <div class='row'> 
 <div class="col-md-4">
 <?= $form->field($model, 'openingDate')->widget(
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
 <?= $form->field($model, 'registrationAuthority_id')->widget(select2::classname(),[
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
 <?= $form->field($model, 'ownership_id')->widget(select2::classname(),[
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
                         <?= $form->field($modeleconomicsector, "[{$i}]startDate")->input('date');

                         //$form->field($modeleconomicsector, "[{$i}]startDate")->widget(
                         //    DatePicker::className(), [
                         //    // inline too, not bad
                         //     'inline' => false, 
                         //     // modify template for custom rendering
                         //    // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                         //     'options' => [
                         //        'id' => 'rdemployerecosector-1-startdate'
                         //     ],
                         //    'clientOptions' => [
                         //        'autoclose' => true,
                         //        'format' => 'yyyy-mm-dd'
                         //    ]
                         //    ]);

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
                        $.post("'.Url::to(['rdperson/lists', 'id'=> '']).'"+$(this).val(),function(data){
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
                        $.post("'.Url::to(['rdperson/lists', 'id'=> '']).'"+$(this).val(),function(data){
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
 <div class="col-md-4" id='lastName' style='display:block'> 
  <?= $form->field($person, 'lastName')->textInput(['maxlength' => true]) ?>    
 </div>
 <div class="col-md-4" id='firstName' style='display:block'> 
  <?= $form->field($person, 'firstName')->textInput(['maxlength' => true]) ?>    
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

 
  
    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
