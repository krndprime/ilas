<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_isco08_level4}}".
 *
 * @property int $id
 * @property string $occupation
 *
 * @property ChildEmployment[] $childEmployments
 * @property DisputeCase[] $disputeCases
 * @property RdEmployee[] $rdEmployees
 */
class Sisco08level4 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_isco08_level4}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['occupation'], 'required'],
            [['occupation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'occupation' => Yii::t('app', 'Occupation'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildEmployments()
    {
        return $this->hasMany(ChildEmployment::className(), ['occupation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisputeCases()
    {
        return $this->hasMany(DisputeCase::className(), ['occupation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdEmployees()
    {
        return $this->hasMany(RdEmployee::className(), ['occupation_id' => 'id']);
    }
}
