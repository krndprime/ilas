<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Sprovince;
use backend\models\Sdistrict;
use backend\models\Sgeosector;
use backend\models\Scell;
use backend\models\Svillage;
use backend\modules\child\models\Child;
use backend\models\Ssex;
use backend\models\Sedulevel;
use backend\models\Srelationship;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Childfound */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="childfound-form">

<?php $form = ActiveForm::begin(); ?>

<!-- Verifying or creating child -->
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

    <!-- Verifying or creating child -->

    <!-- Child found -->

        <fieldset class="scheduler-border">
         <legend class="scheduler-border" >Found in</legend>            
            <div class='row'>
                <div class="col-md-4" id='province' style='display:block'>
                 <?= $form->field($model, 'province_id')->widget(select2::classname(),[
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
                 <?= $form->field($model, 'district_id')->widget(select2::classname(),[
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
                 <?= $form->field($model, 'sector_id')->widget(select2::classname(),[
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
                 <?= $form->field($model, 'cell_id')->widget(select2::classname(),[
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
                <?= $form->field($model, 'foundVillage_id')->widget(select2::classname(),[
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
                <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>       
                </div>
                </div>

        </fieldset>

        <!-- End Child found -->
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
