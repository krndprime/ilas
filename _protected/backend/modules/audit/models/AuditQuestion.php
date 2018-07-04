<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%audit_question}}".
 *
 * @property int $id
 * @property string $question
 * @property int $section_id
 * @property int $order
 * @property int $created_by
 * @property string $created_on
 *
 * @property AuditAnswer[] $auditAnswers
 * @property AuditAnswerinfo[] $auditAnswerinfos
 * @property AuditOption[] $auditOptions
 * @property User $createdBy
 * @property AuditSection $section
 * @property AuditQuestionweight[] $auditQuestionweights
 */
class AuditQuestion extends \yii\db\ActiveRecord
{
    public $module_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%audit_question}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'section_id', 'order', 'created_by', 'created_on'], 'required'],
            [['question'], 'string'],
            [['section_id', 'order', 'created_by','module_id'], 'integer'],
            [['created_on'], 'safe'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuditSection::className(), 'targetAttribute' => ['section_id' => 'id']],
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
            'module_id' => Yii::t('app', 'Module'),
            'section_id' => Yii::t('app', 'Section'),
            'order' => Yii::t('app', 'Question order'),
            'created_by' => Yii::t('app', 'Created by'),
            'created_on' => Yii::t('app', 'Created on'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditAnswers()
    {
        return $this->hasMany(AuditAnswer::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditAnswerinfos()
    {
        return $this->hasMany(AuditAnswerinfo::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditOptions()
    {
        return $this->hasMany(AuditOption::className(), ['question_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(AuditSection::className(), ['id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditQuestionweights()
    {
        return $this->hasMany(AuditQuestionweight::className(), ['question_id' => 'id']);
    }
}
