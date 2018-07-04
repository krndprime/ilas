<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_village}}".
 *
 * @property int $id
 * @property string $village
 * @property int $cell_id
 *
 * @property Child[] $children
 * @property Child[] $children0
 * @property RdEmployer[] $rdEmployers
 * @property RdPerson[] $rdPeople
 * @property SocialFederation[] $socialFederations
 * @property SocialVisitedcompany[] $socialVisitedcompanies
 */
class Svillage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_village}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['village', 'cell_id'], 'required'],
            [['cell_id'], 'integer'],
            [['village'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'village' => Yii::t('app', 'Village'),
            'cell_id' => Yii::t('app', 'Cell ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Child::className(), ['foundVillage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren0()
    {
        return $this->hasMany(Child::className(), ['originVillage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdEmployers()
    {
        return $this->hasMany(RdEmployer::className(), ['village_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdPeople()
    {
        return $this->hasMany(RdPerson::className(), ['village_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialFederations()
    {
        return $this->hasMany(SocialFederation::className(), ['village_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialVisitedcompanies()
    {
        return $this->hasMany(SocialVisitedcompany::className(), ['village_id' => 'id']);
    }
}
