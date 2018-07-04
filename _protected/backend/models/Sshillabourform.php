<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_chillabourform}}".
 *
 * @property int $id
 * @property string $form
 *
 * @property BiChildlabour[] $biChildlabours
 * @property ChildCase[] $childCases
 */
class Sshillabourform extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_chillabourform}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['form'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'form' => Yii::t('app', 'Form'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiChildlabours()
    {
        return $this->hasMany(BiChildlabour::className(), ['chilLabourForm_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildCases()
    {
        return $this->hasMany(ChildCase::className(), ['childLabourForm_id' => 'id']);
    }
}
