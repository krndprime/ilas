<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_childactiontaken}}".
 *
 * @property int $id
 * @property string $action
 *
 * @property BiChildlabour[] $biChildlabours
 * @property ChildCase[] $childCases
 */
class Schildactiontaken extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_childactiontaken}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['action'], 'required'],
            [['action'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'action' => Yii::t('app', 'Action'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiChildlabours()
    {
        return $this->hasMany(BiChildlabour::className(), ['childCaseActionTaken_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildCases()
    {
        return $this->hasMany(ChildCase::className(), ['actionTaken_id' => 'id']);
    }
}
