<?php

namespace backend\modules\inspection\models;

use Yii;

/**
 * This is the model class for table "{{%inspection_option}}".
 *
 * @property int $id
 * @property string $option
 * @property int $question_id
 * @property int $datatype_id
 *
 * @property SDatatype $datatype
 * @property InspectionQuestion $question
 */
class InspectionOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%inspection_option}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option', 'question_id', 'datatype_id'], 'required'],
            [['question_id', 'datatype_id'], 'integer'],
            [['option'], 'string', 'max' => 255],
            [['datatype_id'], 'exist', 'skipOnError' => true, 'targetClass' => SDatatype::className(), 'targetAttribute' => ['datatype_id' => 'id']],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => InspectionQuestion::className(), 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'option' => Yii::t('app', 'Option'),
            'question_id' => Yii::t('app', 'Question'),
            'datatype_id' => Yii::t('app', 'Datatype'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatatype()
    {
        return $this->hasOne(SDatatype::className(), ['id' => 'datatype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(InspectionQuestion::className(), ['id' => 'question_id']);
    }
}
