<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_isicr4_level4}}".
 *
 * @property int $id
 * @property string $code
 * @property string $ecosector
 *
 * @property BiChildlabour[] $biChildlabours
 * @property RdEmployerecosector[] $rdEmployerecosectors
 * @property SocialVisitedcompany[] $socialVisitedcompanies
 */
class Sisicr4level4 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_isicr4_level4}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'ecosector'], 'required'],
            [['code'], 'string', 'max' => 10],
            [['ecosector'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'ecosector' => Yii::t('app', 'Ecosector'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBiChildlabours()
    {
        return $this->hasMany(BiChildlabour::className(), ['employerEcosector_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdEmployerecosectors()
    {
        return $this->hasMany(RdEmployerecosector::className(), ['ecosector_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialVisitedcompanies()
    {
        return $this->hasMany(SocialVisitedcompany::className(), ['isicr4L4_id' => 'id']);
    }
}
