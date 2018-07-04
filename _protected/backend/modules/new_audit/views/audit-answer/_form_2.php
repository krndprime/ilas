<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\modules\audit\models\AuditTypeSection;
use backend\modules\audit\models\AuditAudit;
use backend\modules\audit\models\RdEmployer;
use backend\modules\audit\models\AuditSection;
use backend\modules\audit\models\AuditQuestion;
use backend\modules\audit\models\AuditOption;
use backend\modules\audit\models\SIsicr4Level1;
use backend\modules\audit\models\SWeight;

/* @var $this yii\web\View */
/* @var $model backend\modules\audit\models\AuditAnswer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="audit-answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        //Get inspection id from inspection-inspection/index
        IF(ISSET($_POST['id']))
            $aid=$_POST['id'];
        ELSE $aid=NULL;
    ?>
    
    <?= $form->field($model, 'audit_id')->widget(select2::classname(),[
        'data'=>ArrayHelper::map(AuditAudit::find()->where(['id'=>$aid])->all(),'id','name'),
        'theme' => Select2::THEME_KRAJEE, 
//        'options'=>[
//            'placeholder'=>'Select inspection',    
//        ],
        'language' => 'en',
        //'disabled' => TRUE,
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

    <?php //echo $form->field($model, 'question_id')->textInput() ?>

    <?php //echo $form->field($model, 'answer')->textInput() ?>
    
    <?php
        
        $section=AuditTypeSection::find()
                -> joinWith('section')
                -> where(['audit_id' => $aid])
                -> all();
        
//        print"<pre>";
//        print_r($section);
//        print"</pre>";
//        die();
        
        foreach($section AS $section)
        {
            echo "<div class='alert alert-info'>".$section['section']['section']."</div>";
            
            $sid=$section['section_id'];
            $questions= new AuditQuestion();
            $question=$questions::find()->where(["section_id"=>$sid])->all();
            
            echo"<table class='table'>";
            foreach($question as $question)
            {
                $qid=$question['id'];
                $options= new AuditOption();
                $option=$options::find()->where(["question_id"=>$qid])->all();

                $c=COUNT($option);

                echo"<tr><td width='40%' valign='top'>";
                echo $question['question'].""
                        . "<input type='hidden' name='question[]' value=".$question['id']."></td><td with='60%'><table class='table table-condensed'>";

                foreach($option AS $option)
                {
                    IF($option['datatype_id']==2)
                    {
                        echo "<tr><td width='60%'>".$option['option']."<input type='hidden' name='option[]' value=".$option['id']."></td><td width='40%'><input type='number' name='answer[]'></td></tr>";
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
                    
                    IF($option['datatype_id']==9)
                    {
                        $wts= new SWeight();
                        $wt=$wts::find()->all();
                        foreach($wt AS $wt)
                        {
                            $id=$wt['id'];
                            $value=$wt['weight'];
                            echo "<input type='radio' name='answerradio[".$qid."]' value=".$id."> $value</input> &nbsp;";
                        }
                    }
                }
                echo"</table></td></tr>";
            }
            echo"</table>";
        }
    ?>

    <?php //echo $form->field($model, 'created_by')->textInput() ?>

    <?php //echo $form->field($model, 'created_on')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
