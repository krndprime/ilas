<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_injurypartofthebody}}".
 *
 * @property int $id
 * @property string $partOfTheBody
 *
 * @property OshInjury[] $oshInjuries
 */
class Sinjurypartofthebody extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_injurypartofthebody}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['partOfTheBody'], 'string', 'max' => 45],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'partOfTheBody' => Yii::t('app', 'Part Of The Body'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOshInjuries()
    {
        return $this->hasMany(OshInjury::className(), ['partOfTheBody_id' => 'id']);
    }
}
