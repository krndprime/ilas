<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_mainecosector}}".
 *
 * @property int $id
 * @property string $sector
 */
class Smainecosector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_mainecosector}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sector'], 'required'],
            [['sector'], 'string', 'max' => 45],
            [['sector'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sector' => Yii::t('app', 'Type of economic sector'),
        ];
    }
}
