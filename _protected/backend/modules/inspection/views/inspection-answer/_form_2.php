<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

use backend\modules\inspection\models\InspectionTypeSection;
use backend\modules\inspection\models\InspectionSection;
use backend\modules\inspection\models\InspectionInspection;
use backend\modules\inspection\models\RdEmployer;
use backend\modules\inspection\models\InspectionQuestion;
use backend\modules\inspection\models\InspectionOption;
use backend\modules\inspection\models\SIsicr4Level1;
use backend\modules\inspection\models\InspectionSalmodality;
use backend\modules\inspection\models\InspectionWorkhours;
use backend\models\Snoyes;

/* @var $this yii\web\View */
/* @var $model backend\modules\inspection\models\InspectionAnswer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspection-answer-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php 
        //Get inspection id from inspection-inspection/index
        IF(ISSET($_POST['id']))
            $eid=$_POST['id'];
        ELSE $eid=NULL;
    ?>
    
    <?= $form->field($model, 'inspection_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(InspectionInspection::find()->where(['id'=>$eid])->all(),'id','name'),
        'theme' => Select2::THEME_KRAJEE, 
//        'options'=>[
//            'placeholder'=>'Select inspection',    
//        ],
        'language' => 'en',
        'readonly' => TRUE,
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>

    <?= $form->field($model, 'establishment_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(RdEmployer::find()->all(),'id','companyName'),
        'theme' => Select2::THEME_KRAJEE, 
        'options'=>[
            'placeholder'=>'Select establishment',    
        ],
        'language' => 'en',
        'pluginOptions'=>['alloweClear'=>true],
        ]);
    ?>

    <?php
        $section=InspectionTypeSection::find()
                -> joinWith('section')
                -> where(['inspection_id' => $eid])
                ->all();
            
        foreach($section AS $section)
        {
            echo "<div class='alert alert-info'>".$section['section']['section']."</div>";
            $sid=$section['section_id'];
            $questions= new InspectionQuestion();
            $question=$questions::find()->where(["section_id"=>$sid])->all();
            
            echo"<table class='table'>";
            foreach($question as $question)
            {
                $qid=$question['id'];
                $options= new InspectionOption();
                $option=$options::find()->where(["question_id"=>$qid])->all();

                $c=COUNT($option);

                echo"<tr>"
                    . "<td width='40%' valign='top'>";
                echo $question['question']
                    ."<input type='hidden' name='question[]' value=".$question['id']."></td><td with='60%'>"
                        . "<table class='table table-condensed'>";

                foreach($option AS $option)
                {
                    IF($option['datatype_id']==2)
                    {
                        echo "<tr><td width='60%'>".$option['option']."<input type='hidden' name='option[]' value=".$option['id']."></td><td width='40%'><input type='number' name='answer[]'></td></tr>";
                    }

                    IF($option['datatype_id']==3)
                    {
                        echo "<tr><td width='60%'>".$option['option']."<input type='hidden' name='option[]' value=".$option['id']."></td><td width='40%'><input type='number' name='answer[]' min=0 max=100></td></tr>";
                    }

                    IF($option['datatype_id']==4)
                    {
                        echo "<tr><td width='30%'>".$option['option']."<input type='hidden' name='option[]' value=".$option['id']."></td><td width='70%'><textarea rows=5 cols=50 name='answer[]'></textarea></td></tr>";
                    }

                    IF($option['datatype_id']==5)
                    {
                        $mods= new SIsicr4Level1();
                        $mod=$mods::find()->all();
                        echo "<input type='hidden' name='option[]' value=".$option['id']."><select name='answer[]' style='width: 80%'><option value=''>Select economic activity</option>";
                        foreach($mod AS $mod)
                        {
                            $id=$mod['id'];
                            $value=$mod['ecosector'];
                            echo "<option value=$id>$value</option>";
                        }
                        echo "</select>";
                    }
                    IF($option['datatype_id']==6)
                    {
                        $mods= new InspectionSalmodality();
                        $mod=$mods::find()->all();
                        echo "<input type='hidden' name='option[]' value=".$option['id']."><select name='answer[]' style='width: 80%'><option value=''>Select salary modality</option>";
                        foreach($mod AS $mod)
                        {
                            $id=$mod['id'];
                            $value=$mod['modality'];
                            echo "<option value=$id>$value</option>";
                        }
                        echo "</select>";
                    }
                    IF($option['datatype_id']==7)
                    {
                        $whs= new InspectionWorkhours();
                        $wh=$whs::find()->all();
                        echo "<input type='hidden' name='option[]' value=".$option['id']."><select name='answer[]' style='width: 80%'><option value=''>Select working hours</option>";
                        foreach($wh AS $wh)
                        {
                            $id=$wh['id'];
                            $value=$wh['workhours'];
                            echo "<option value=$id>$value</option>";
                        }
                        echo "</select>";
                    }

                    IF($option['datatype_id']==8)
                    {
                        $whs= new Snoyes();
                        $wh=$whs::find()->all();
                        echo "<tr><td width='30%'>".$option['option']."<input type='hidden' name='option[]' value=".$option['id']."></td><td width='70%'><select name='answer[]' style='width: 100%'><option value=''>Select yes or no</option>";
                        foreach($wh AS $wh)
                        {
                            $id=$wh['id'];
                            $value=$wh['noyes'];
                            echo "<option value=$id>$value</option>";
                        }
                        echo "</select></td></tr>";
                    }
                }
                echo"</table></td></tr>";
            }
            echo"</table>";
        }
    ?>
    <?php //echo $form->field($model, 'question_id')->textInput() ?>

    <?php //echo $form->field($model, 'option_id')->textInput() ?>

    <?php //echo $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <?php //echo $form->field($model, 'created_by')->textInput() ?>

    <?php //echo $form->field($model, 'created_on')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
