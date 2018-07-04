<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_questiontype}}".
 *
 * @property int $id
 * @property string $type
 *
 * @property IaQuestion[] $iaQuestions
 */
class Squestiontype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_questiontype}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type'], 'required'],
            [['id'], 'integer'],
            [['type'], 'string', 'max' => 45],
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
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIaQuestions()
    {
        return $this->hasMany(IaQuestion::className(), ['questionType_id' => 'id']);
    }
}
