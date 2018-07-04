<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_childussdaction}}".
 *
 * @property int $id
 * @property string $action
 *
 * @property ChildUssdapproval[] $childUssdapprovals
 */
class Schildussdaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_childussdaction}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['action'], 'required'],
            [['action'], 'string', 'max' => 45],
            [['action'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'action' => Yii::t('app', 'Action'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildUssdapprovals()
    {
        return $this->hasMany(ChildUssdapproval::className(), ['childUssdAction_id' => 'id']);
    }
}
