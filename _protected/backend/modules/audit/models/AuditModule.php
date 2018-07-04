<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%audit_module}}".
 *
 * @property int $id
 * @property string $module
 *
 * @property AuditSection[] $auditSections
 */
class AuditModule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%audit_module}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module'], 'required'],
            [['module'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'module' => Yii::t('app', 'Module'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditSections()
    {
        return $this->hasMany(AuditSection::className(), ['module_id' => 'id']);
    }
}
