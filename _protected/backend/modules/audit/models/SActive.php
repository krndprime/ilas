<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%s_active}}".
 *
 * @property int $id
 * @property string $status
 *
 * @property AuditAudit[] $auditAudits
 * @property AuditQuestionweight[] $auditQuestionweights
 * @property InspectionInspection[] $inspectionInspections
 */
class SActive extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_active}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditAudits()
    {
        return $this->hasMany(AuditAudit::className(), ['status_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditQuestionweights()
    {
        return $this->hasMany(AuditQuestionweight::className(), ['active_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectionInspections()
    {
        return $this->hasMany(InspectionInspection::className(), ['status_id' => 'id']);
    }
}
