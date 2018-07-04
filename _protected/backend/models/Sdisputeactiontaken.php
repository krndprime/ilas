<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_disputeactiontaken}}".
 *
 * @property int $id
 * @property string $actionTaken
 *
 * @property DisputeCase[] $disputeCases
 */
class Sdisputeactiontaken extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_disputeactiontaken}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'actionTaken'], 'required'],
            [['id'], 'integer'],
            [['actionTaken'], 'string', 'max' => 45],
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
            'actionTaken' => Yii::t('app', 'Action Taken'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisputeCases()
    {
        return $this->hasMany(DisputeCase::className(), ['disputeActionTaken_id' => 'id']);
    }
}
