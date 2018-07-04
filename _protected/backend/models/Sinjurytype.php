<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_injurytype}}".
 *
 * @property int $id
 * @property string $type
 *
 * @property OshInjury[] $oshInjuries
 */
class Sinjurytype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_injurytype}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['type'], 'string', 'max' => 45],
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
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOshInjuries()
    {
        return $this->hasMany(OshInjury::className(), ['injuryType_id' => 'id']);
    }
}
