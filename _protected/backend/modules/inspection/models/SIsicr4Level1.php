<?php

namespace backend\modules\inspection\models;

use Yii;

/**
 * This is the model class for table "{{%s_isicr4_level1}}".
 *
 * @property string $activities_id
 * @property string $activities_description
 */
class SIsicr4Level1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_isicr4_level1}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activities_id', 'activities_description'], 'required'],
            [['activities_id'], 'string', 'max' => 4],
            [['activities_description'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'activities_id' => Yii::t('app', 'Activities ID'),
            'activities_description' => Yii::t('app', 'Activities Description'),
        ];
    }
}
