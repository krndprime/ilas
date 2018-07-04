<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use backend\models\Ssex;
use backend\models\Sedulevel;
use backend\models\Svillage;
use backend\models\Sprovince;
use backend\models\Sdistrict;
use backend\models\Sgeosector;
use backend\models\Srelationship;
use backend\models\Scell;

/* @var $this yii\web\View */
/* @var $model backend\modules\child\models\Child */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="child-form">
<?php $form = ActiveForm::begin(); ?>

<fieldset class="scheduler-border">
 <legend class="scheduler-border" >Basic information</legend>
    <div class='row'>
    <div class="col-md-4">
    <?= $form->field($model, 'childLastName')->textInput(['maxlength' => true]) ?>        
    </div>
    <div class="col-md-4">
    <?= $form->field($model, 'childMiddleName')->textInput(['maxlength' => true]) ?>        
    </div>
    <div class="col-md-4"> 
    <?= $form->field($model, 'childFirstName')->textInput(['maxlength' => true]) ?>       
    </div>
    </div>
    <div class='row'>
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
    <div class="col-md-4"><?= $form->field($model, 'sex_id')->widget(select2::classname(),[
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
    <?= $form->field($model, 'edulevel_id')->widget(select2::classname(),[
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
    </fieldset>
    <fieldset class="scheduler-border">
 <legend class="scheduler-border" >Origin of</legend>
    <div class='row'>
    <div class="col-md-4">
     <?= $form->field($model, 'provincee_id')->widget(select2::classname(),[
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
    <?= $form->field($model, 'originDistrict_id')->widget(select2::classname(),[
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
    <?= $form->field($model, 'originSector_id')->widget(select2::classname(),[
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
    <?= $form->field($model, 'originCell_id')->widget(select2::classname(),[
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
    <?= $form->field($model, 'originVillage_id')->widget(select2::classname(),[
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
     <legend class="scheduler-border" >Parenthood</legend>
        <div class='row'>
        <div class="col-md-4">
         <?= $form->field($model, 'guardianNames')->textInput(['maxlength' => true]) ?>      
        </div> 
        <div class="col-md-4">
         <?= $form->field($model, 'contactPhone')->textInput(['maxlength' => true]) ?>        
        </div>
        <div class="col-md-4">
         <?= $form->field($model, 'relationship_id')->widget(select2::classname(),[
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
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
