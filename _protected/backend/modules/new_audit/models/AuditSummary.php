<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%audit_summary}}".
 *
 * @property int $id
 * @property int $audit_id
 * @property int $establishment_id
 * @property string $question
 * @property int $weight
 * @property int $answer
 * @property int $result
 * @property int $highest
 * @property string $percentage
 *
 * @property RdEmployer $establishment
 * @property AuditAudit $audit
 */
class AuditSummary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%audit_summary}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['audit_id', 'establishment_id'], 'required'],
            [['audit_id', 'establishment_id', 'weight', 'answer', 'result', 'highest'], 'integer'],
            [['question'], 'string'],
            [['percentage'], 'number'],
            [['establishment_id'], 'exist', 'skipOnError' => true, 'targetClass' => RdEmployer::className(), 'targetAttribute' => ['establishment_id' => 'id']],
            [['audit_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuditAudit::className(), 'targetAttribute' => ['audit_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'audit_id' => Yii::t('app', 'Audit ID'),
            'establishment_id' => Yii::t('app', 'Establishment ID'),
            'question' => Yii::t('app', 'Question'),
            'weight' => Yii::t('app', 'Weight'),
            'answer' => Yii::t('app', 'Answer'),
            'result' => Yii::t('app', 'Result'),
            'highest' => Yii::t('app', 'Highest'),
            'percentage' => Yii::t('app', 'Percentage'),
        ];
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
    public function getAudit()
    {
        return $this->hasOne(AuditAudit::className(), ['id' => 'audit_id']);
    }
}
