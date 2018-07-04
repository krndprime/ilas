<?php

namespace backend\modules\inspection\models;

use Yii;

/**
 * This is the model class for table "{{%inspection_question}}".
 *
 * @property int $id
 * @property string $question
 * @property int $section_id
 *
 * @property InspectionAnswer[] $inspectionAnswers
 * @property InspectionSection $section
 */
class InspectionQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%inspection_question}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'section_id'], 'required'],
            [['question'], 'string'],
            [['section_id'], 'integer'],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => InspectionSection::className(), 'targetAttribute' => ['section_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'question' => Yii::t('app', 'Question'),
            'section_id' => Yii::t('app', 'Section'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectionAnswers()
    {
        return $this->hasMany(InspectionAnswer::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(InspectionSection::className(), ['id' => 'section_id']);
    }
}
