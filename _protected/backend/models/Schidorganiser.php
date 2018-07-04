<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_chidorganiser}}".
 *
 * @property int $id
 * @property string $organiser
 *
 * @property ChildAwarenesscampaign[] $childAwarenesscampaigns
 */
class Schidorganiser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_chidorganiser}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organiser'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'organiser' => Yii::t('app', 'Organiser'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildAwarenesscampaigns()
    {
        return $this->hasMany(ChildAwarenesscampaign::className(), ['orgernisor_id' => 'id']);
    }
}
