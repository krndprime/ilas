<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_disputecasetype}}".
 *
 * @property int $id
 * @property string $casetype
 */
class Sdisputecasetype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_disputecasetype}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['casetype'], 'required'],
            [['casetype'], 'string', 'max' => 45],
            [['casetype'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'casetype' => Yii::t('app', 'Casetype'),
        ];
    }
}
