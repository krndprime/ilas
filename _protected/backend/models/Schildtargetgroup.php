<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_childtargetgroup}}".
 *
 * @property int $id
 * @property string $group
 *
 * @property ChildAwarenesscampaign[] $childAwarenesscampaigns
 */
class Schildtargetgroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_childtargetgroup}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'group' => Yii::t('app', 'Group'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildAwarenesscampaigns()
    {
        return $this->hasMany(ChildAwarenesscampaign::className(), ['targetGroup_id' => 'id']);
    }
}
