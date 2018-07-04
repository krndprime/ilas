<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_injurycause}}".
 *
 * @property int $id
 * @property string $cause
 *
 * @property OshInjury[] $oshInjuries
 */
class Sinjurycause extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_injurycause}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cause'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cause' => Yii::t('app', 'Cause'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOshInjuries()
    {
        return $this->hasMany(OshInjury::className(), ['cause_id' => 'id']);
    }
}
