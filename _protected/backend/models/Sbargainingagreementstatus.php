<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_bargainingagreementstatus}}".
 *
 * @property int $id
 * @property string $status
 */
class Sbargainingagreementstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_bargainingagreementstatus}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'string', 'max' => 45],
            [['status'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
