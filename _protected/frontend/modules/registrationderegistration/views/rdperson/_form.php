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
use backend\models\Sdocumenttype;
use backend\models\Scountrycodeiso3166;

/* @var $this yii\web\View */
/* @var $model backend\modules\registrationderegistration\models\Rdperson */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rdperson-form">

    <?php $form = ActiveForm::begin(); ?>
<div class='row'>    
 <div class="col-md-6">
    <?= $form->field($model, 'document_id')->widget(select2::classname(),[
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
     <div class="col-md-6">
    <?= $form->field($model, 'country_id')->widget(select2::classname(),[
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

    <div class='row'>
    <div id='nid' style='display:none'>    
        <div class="col-md-4">
        <?= $form->field($model, 'nid')->textInput(['maxlength' => true]) ?>            
        </div>
    </div>

    <div id='passport' style='display:none'>    
        <div class="col-md-4">
        <?= $form->field($model, 'passport')->textInput(['maxlength' => true]) ?>            
        </div>
    </div>
    <div id='document' style='display:block'>    
        <div class="col-md-4">
        <?= $form->field($model, 'documentnumber')->textInput(['maxlength' => true]) ?>            
        </div>
    </div>
        <div class="col-md-4">
        <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>            
        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>            
        </div>
    </div>

    <div class='row'>    
        <div class="col-md-4">
        <?= $form->field($model, 'middleName')->textInput(['maxlength' => true]) ?>            
        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'dateOfBirth')->widget(
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
        <?= $form->field($model, 'sex_id')->widget(select2::classname(),[
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
    </div>

    <div class='row'>
        <div class="col-md-4" id='province' style='display:block'>
         <?= $form->field($model, 'province_id')->widget(select2::classname(),[
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
         <div class="col-md-4" id='district' style='display:block'>
         <?= $form->field($model, 'district_id')->widget(select2::classname(),[
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
         <?= $form->field($model, 'sector_id')->widget(select2::classname(),[
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
                                                 $("select#rdperson-village_id" ).html(data);
                                            });'
                                    ],
                                    'language' => 'en',
                                    'pluginOptions'=>['alloweClear'=>true],
                                    ]); 
                                    ?>    
         </div>    
                <div class="col-md-4">
                <?= $form->field($model, 'village_id')->widget(select2::classname(),[
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
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>            
                </div>
                </div>
                <div class='row'>
                <div class="col-md-4">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>            
                </div>
                <div class="col-md-4">
                <?= $form->field($model, 'rssbNumber')->textInput(['maxlength' => true]) ?>            
                </div>
            </div> 

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
