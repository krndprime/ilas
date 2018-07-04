<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_casestatus}}".
 *
 * @property int $id
 * @property string $status
 *
 * @property BiChildlabour[] $biChildlabours
 * @property ChildCase[] $childCases
 * @property DisputeCase[] $disputeCases
 */
class Scasestatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_casestatus}}';
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
    public function getBiChildlabours()
    {
        return $this->hasMany(BiChildlabour::className(), ['childCaseStatus_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildCases()
    {
        return $this->hasMany(ChildCase::className(), ['caseStatus_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisputeCases()
    {
        return $this->hasMany(DisputeCase::className(), ['caseStatus_id' => 'id']);
    }
}
