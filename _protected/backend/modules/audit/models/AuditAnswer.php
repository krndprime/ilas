<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%audit_answer}}".
 *
 * @property int $id
 * @property int $audit_id
 * @property int $establishment_id
 * @property int $question_id
 * @property int $answer
 * @property int $created_by
 * @property string $created_on
 *
 * @property AuditAudit $audit
 * @property RdEmployer $establishment
 * @property AuditQuestion $question
 * @property User $createdBy
 */
class AuditAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%audit_answer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['audit_id', 'establishment_id', 'question_id', 'answer'], 'required'],
            [['audit_id', 'establishment_id', 'question_id', 'answer', 'created_by'], 'integer'],
            [['created_on'], 'safe'],
            [['audit_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuditAudit::className(), 'targetAttribute' => ['audit_id' => 'id']],
            [['establishment_id'], 'exist', 'skipOnError' => true, 'targetClass' => RdEmployer::className(), 'targetAttribute' => ['establishment_id' => 'id']],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuditQuestion::className(), 'targetAttribute' => ['question_id' => 'id']],
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
            'audit_id' => Yii::t('app', 'Audit'),
            'establishment_id' => Yii::t('app', 'Establishment'),
            'question_id' => Yii::t('app', 'Question'),
            'answer' => Yii::t('app', 'Answer'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_on' => Yii::t('app', 'Created On'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAudit()
    {
        return $this->hasOne(AuditAudit::className(), ['id' => 'audit_id']);
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
        return $this->hasOne(AuditQuestion::className(), ['id' => 'question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
