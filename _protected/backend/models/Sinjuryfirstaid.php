<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_injuryfirstaid}}".
 *
 * @property int $id
 * @property string $firstAid
 *
 * @property OshInjury[] $oshInjuries
 */
class Sinjuryfirstaid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_injuryfirstaid}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['firstAid'], 'string', 'max' => 45],
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
            'firstAid' => Yii::t('app', 'First Aid'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOshInjuries()
    {
        return $this->hasMany(OshInjury::className(), ['firstAidReceived_id' => 'id']);
    }
}
