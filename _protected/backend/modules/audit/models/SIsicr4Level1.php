<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%s_isicr4_level1}}".
 *
 * @property string $id
 * @property string $ecosector
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
            [['id', 'ecosector'], 'required'],
            [['id'], 'string', 'max' => 4],
            [['ecosector'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ecosector' => Yii::t('app', 'Ecosector'),
        ];
    }
}
