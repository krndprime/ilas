<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%s_weight}}".
 *
 * @property int $id
 * @property int $weight
 */
class SWeight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_weight}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['weight'], 'required'],
            [['weight'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'weight' => Yii::t('app', 'Weight'),
        ];
    }
}
