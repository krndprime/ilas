<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%s_companystatus}}".
 *
 * @property int $id
 * @property string $status
 *
 * @property RdCompony[] $rdComponies
 */
class Scompanystatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_companystatus}}';
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdComponies()
    {
        return $this->hasMany(RdCompony::className(), ['companyStatus_id' => 'id']);
    }
}
