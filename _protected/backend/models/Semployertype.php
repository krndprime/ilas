<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_employertype}}".
 *
 * @property int $id
 * @property string $type
 *
 * @property BiChildlabour[] $biChildlabours
 * @property RdEmployer[] $rdEmployers
 */
class Semployertype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_employertype}}';
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
        return $this->hasMany(BiChildlabour::className(), ['employerType_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdEmployers()
    {
        return $this->hasMany(RdEmployer::className(), ['employerType_id' => 'id']);
    }
}
