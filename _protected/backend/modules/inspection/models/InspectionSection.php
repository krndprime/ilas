<?php

namespace backend\modules\inspection\models;

use Yii;

/**
 * This is the model class for table "{{%inspection_section}}".
 *
 * @property int $id
 * @property string $section
 *
 * @property InspectionQuestion[] $inspectionQuestions
 */
class InspectionSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%inspection_section}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section'], 'required'],
            [['section'], 'string', 'max' => 45],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectionQuestions()
    {
        return $this->hasMany(InspectionQuestion::className(), ['section_id' => 'id']);
    }
}
