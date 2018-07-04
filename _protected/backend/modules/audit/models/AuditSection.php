<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%audit_section}}".
 *
 * @property int $id
 * @property string $section
 * @property int $module_id
 *
 * @property AuditQuestion[] $auditQuestions
 * @property AuditModule $module
 */
class AuditSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%audit_section}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section', 'module_id'], 'required'],
            [['module_id'], 'integer'],
            [['section'], 'string', 'max' => 45],
            [['module_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuditModule::className(), 'targetAttribute' => ['module_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'section' => Yii::t('app', 'Section'),
            'module_id' => Yii::t('app', 'Module'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditQuestions()
    {
        return $this->hasMany(AuditQuestion::className(), ['section_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(AuditModule::className(), ['id' => 'module_id']);
    }
}
