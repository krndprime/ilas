<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_region}}".
 *
 * @property int $id Village ID
 * @property string $village
 * @property string $cell
 * @property string $sector
 * @property string $district
 * @property string $province
 *
 * @property BiChildlabour[] $biChildlabours
 * @property BiChildlabour[] $biChildlabours0
 * @property BiChildlabour[] $biChildlabours1
 * @property BiEmployer[] $biEmployers
 */
class Sregion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_region}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['village', 'cell', 'district', 'province'], 'string', 'max' => 45],
            [['sector'], 'string', 'max' => 30],
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
            'village' => Yii::t('app', 'Village'),
            'cell' => Yii::t('app', 'Cell'),
            'sector' => Yii::t('app', 'Sector'),
            'district' => Yii::t('app', 'District'),
            'province' => Yii::t('app', 'Province'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiChildlabours()
    {
        return $this->hasMany(BiChildlabour::className(), ['childFoundVillage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiChildlabours0()
    {
        return $this->hasMany(BiChildlabour::className(), ['childOriginVillage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiChildlabours1()
    {
        return $this->hasMany(BiChildlabour::className(), ['employerVillage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiEmployers()
    {
        return $this->hasMany(BiEmployer::className(), ['village_id' => 'id']);
    }
}
