<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_childlabourtype}}".
 *
 * @property int $id
 * @property string $type
 *
 * @property BiChildlabour[] $biChildlabours
 * @property ChildCase[] $childCases
 */
class Schildlabourtype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_childlabourtype}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiChildlabours()
    {
        return $this->hasMany(BiChildlabour::className(), ['chilLabourType_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildCases()
    {
        return $this->hasMany(ChildCase::className(), ['childLabourType_id' => 'id']);
    }
}
