<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_employerStatus}}".
 *
 * @property int $id
 * @property string $status
 *
 * @property BiChildlabour[] $biChildlabours
 * @property RdEmployer[] $rdEmployers
 */
class Semployerstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_employerStatus}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'required'],
            [['id'], 'integer'],
            [['status'], 'string', 'max' => 45],
            [['id'], 'unique'],
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
    public function getBiChildlabours()
    {
        return $this->hasMany(BiChildlabour::className(), ['employerStatus_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdEmployers()
    {
        return $this->hasMany(RdEmployer::className(), ['status_id' => 'id']);
    }
}
