<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_level}}".
 *
 * @property int $id
 * @property string $level
 *
 * @property SInstitution[] $sInstitutions
 */
class SLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_level}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level'], 'required'],
            [['level'], 'string', 'max' => 135],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'level' => Yii::t('app', 'Level'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSInstitutions()
    {
        return $this->hasMany(SInstitution::className(), ['level_id' => 'id']);
    }
}
