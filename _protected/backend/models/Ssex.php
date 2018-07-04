<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_sex}}".
 *
 * @property int $id
 * @property string $sex
 *
 * @property Child[] $children
 * @property ChildUssd[] $childUssds
 * @property RdPerson[] $rdPeople
 */
class Ssex extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_sex}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex'], 'required'],
            [['sex'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sex' => Yii::t('app', 'Sex'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Child::className(), ['sex_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildUssds()
    {
        return $this->hasMany(ChildUssd::className(), ['sex_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdPeople()
    {
        return $this->hasMany(RdPerson::className(), ['sex_id' => 'id']);
    }
}
