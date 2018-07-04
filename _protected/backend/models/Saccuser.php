<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_accuser}}".
 *
 * @property int $id
 * @property string $accuser
 *
 * @property DisputeCase[] $disputeCases
 */
class Saccuser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_accuser}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accuser'], 'required'],
            [['accuser'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'accuser' => Yii::t('app', 'Accuser'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisputeCases()
    {
        return $this->hasMany(DisputeCase::className(), ['accuser_id' => 'id']);
    }
}
