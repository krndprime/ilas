<?php

namespace backend\modules\inspection\models;

use Yii;

/**
 * This is the model class for table "{{%s_datatype}}".
 *
 * @property int $id
 * @property string $datatype
 *
 * @property AuditOption[] $auditOptions
 * @property InspectionOption[] $inspectionOptions
 * @property InspectionQuestionnaire[] $inspectionQuestionnaires
 */
class SDatatype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_datatype}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datatype'], 'required'],
            [['datatype'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'datatype' => Yii::t('app', 'Datatype'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditOptions()
    {
        return $this->hasMany(AuditOption::className(), ['datatype_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectionOptions()
    {
        return $this->hasMany(InspectionOption::className(), ['datatype_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectionQuestionnaires()
    {
        return $this->hasMany(InspectionQuestionnaire::className(), ['typeofdata_id' => 'id']);
    }
}
