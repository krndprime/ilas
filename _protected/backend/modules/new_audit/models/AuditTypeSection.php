<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%audit_typeSection}}".
 *
 * @property int $id
 * @property int $audit_id
 * @property int $section_id
 * @property int $created_by
 * @property string $created_on
 *
 * @property AuditAudit $audit
 * @property User $createdBy
 * @property AuditSection $section
 */
class AuditTypeSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%audit_typeSection}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['audit_id', 'section_id', 'created_by'], 'integer'],
            [['created_on'], 'safe'],
            [['audit_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuditAudit::className(), 'targetAttribute' => ['audit_id' => 'id']],
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
            'audit_id' => Yii::t('app', 'Audit'),
            'section_id' => Yii::t('app', 'Section'),
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
}
