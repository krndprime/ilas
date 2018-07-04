<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_frequency}}".
 *
 * @property int $id
 * @property string $frequency
 *
 * @property OshInjury[] $oshInjuries
 */
class Sfrequency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_frequency}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['frequency'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'frequency' => Yii::t('app', 'Frequency'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOshInjuries()
    {
        return $this->hasMany(OshInjury::className(), ['frequency_id' => 'id']);
    }
}
