<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_district}}".
 *
 * @property int $id
 * @property string $district
 * @property int $province_id
 *
 * @property Child[] $children
 * @property SocialVisitedcompany[] $socialVisitedcompanies
 */
class Sdistrict extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_district}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province_id'], 'integer'],
            [['district'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'district' => Yii::t('app', 'District'),
            'province_id' => Yii::t('app', 'Province ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Child::className(), ['originDistrict_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialVisitedcompanies()
    {
        return $this->hasMany(SocialVisitedcompany::className(), ['district_id' => 'id']);
    }
}
