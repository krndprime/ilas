<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_sanction}}".
 *
 * @property int $id
 * @property string $sanction
 *
 * @property BiChildlabour[] $biChildlabours
 * @property ChildCase[] $childCases
 */
class Ssanction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_sanction}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sanction'], 'required'],
            [['sanction'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sanction' => Yii::t('app', 'Sanction'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiChildlabours()
    {
        return $this->hasMany(BiChildlabour::className(), ['childCaseSanction_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildCases()
    {
        return $this->hasMany(ChildCase::className(), ['sanction_id' => 'id']);
    }
}
