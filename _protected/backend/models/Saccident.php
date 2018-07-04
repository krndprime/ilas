<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_accident}}".
 *
 * @property int $id
 * @property string $accident
 */
class Saccident extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_accident}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['accident'], 'required'],
            [['accident'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'accident' => Yii::t('app', 'Accident'),
        ];
    }
}
