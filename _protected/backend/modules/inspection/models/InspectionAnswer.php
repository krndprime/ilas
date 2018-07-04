<?php

namespace backend\modules\inspection\models;

use Yii;

/**
 * This is the model class for table "{{%inspection_answer}}".
 *
 * @property int $id
 * @property int $inspection_id
 * @property int $establishment_id
 * @property int $question_id
 * @property int $option_id
 * @property string $answer
 * @property int $created_by
 * @property string $created_on
 *
 * @property InspectionInspection $inspection
 * @property RdEmployer $establishment
 * @property InspectionQuestion $question
 * @property InspectionOption $option
 * @property User $createdBy
 */
class InspectionAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%inspection_answer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inspection_id', 'establishment_id'], 'required'],
            [['inspection_id', 'establishment_id', 'question_id', 'option_id', 'created_by'], 'integer'],
            [['answer'], 'string'],
            [['created_on'], 'safe'],
            [['inspection_id'], 'exist', 'skipOnError' => true, 'targetClass' => InspectionInspection::className(), 'targetAttribute' => ['inspection_id' => 'id']],
            [['establishment_id'], 'exist', 'skipOnError' => true, 'targetClass' => RdEmployer::className(), 'targetAttribute' => ['establishment_id' => 'id']],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => InspectionQuestion::className(), 'targetAttribute' => ['question_id' => 'id']],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => InspectionOption::className(), 'targetAttribute' => ['option_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'inspection_id' => Yii::t('app', 'Inspection'),
            'establishment_id' => Yii::t('app', 'Establishment'),
            'question_id' => Yii::t('app', 'Question'),
            'option_id' => Yii::t('app', 'Option'),
            'answer' => Yii::t('app', 'Answer'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_on' => Yii::t('app', 'Created On'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspection()
    {
        return $this->hasOne(InspectionInspection::className(), ['id' => 'inspection_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablishment()
    {
        return $this->hasOne(RdEmployer::className(), ['id' => 'establishment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(InspectionQuestion::className(), ['id' => 'question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(InspectionOption::className(), ['id' => 'option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
