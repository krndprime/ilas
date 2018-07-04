<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_geosector}}".
 *
 * @property int $id
 * @property string $sector
 * @property int $district_id
 *
 * @property Child[] $children
 * @property ChildAwarenesscampaign[] $childAwarenesscampaigns
 * @property SocialVisitedcompany[] $socialVisitedcompanies
 */
class Sgeosector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_geosector}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector', 'district_id'], 'required'],
            [['district_id'], 'integer'],
            [['sector'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sector' => Yii::t('app', 'Sector'),
            'district_id' => Yii::t('app', 'District ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Child::className(), ['originSector_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildAwarenesscampaigns()
    {
        return $this->hasMany(ChildAwarenesscampaign::className(), ['geosector_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialVisitedcompanies()
    {
        return $this->hasMany(SocialVisitedcompany::className(), ['sector_id' => 'id']);
    }
}
