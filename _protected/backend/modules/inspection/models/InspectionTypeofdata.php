<?php

namespace backend\modules\inspection\models;

use Yii;

/**
 * This is the model class for table "{{%inspection_typeofdata}}".
 *
 * @property int $id
 * @property string $typeofdata
 *
 * @property InspectionQuestionnaire[] $inspectionQuestionnaires
 */
class InspectionTypeofdata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%inspection_typeofdata}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['typeofdata'], 'required'],
            [['typeofdata'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'typeofdata' => Yii::t('app', 'Typeofdata'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectionQuestionnaires()
    {
        return $this->hasMany(InspectionQuestionnaire::className(), ['typeofdata_id' => 'id']);
    }
}
