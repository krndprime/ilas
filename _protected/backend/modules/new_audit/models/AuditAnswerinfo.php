<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%audit_answerinfo}}".
 *
 * @property int $id
 * @property int $audit_id
 * @property int $establishment_id
 * @property int $question_id
 * @property int $option_id
 * @property string $answer
 * @property int $created_by
 * @property string $created_on
 */
class AuditAnswerinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%audit_answerinfo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['audit_id', 'establishment_id', 'question_id', 'option_id', 'created_by', 'created_on'], 'required'],
            [['audit_id', 'establishment_id', 'question_id', 'option_id', 'created_by'], 'integer'],
            [['answer'], 'string'],
            [['created_on'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'audit_id' => Yii::t('app', 'Audit'),
            'establishment_id' => Yii::t('app', 'Establishment'),
            'question_id' => Yii::t('app', 'Question'),
            'option_id' => Yii::t('app', 'Option'),
            'answer' => Yii::t('app', 'Answer'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_on' => Yii::t('app', 'Created On'),
        ];
    }
}
