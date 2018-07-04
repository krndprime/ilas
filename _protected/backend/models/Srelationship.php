<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_relationship}}".
 *
 * @property int $id
 * @property string $relationship
 *
 * @property Child[] $children
 */
class Srelationship extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_relationship}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['relationship'], 'required'],
            [['relationship'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'relationship' => Yii::t('app', 'Relationship'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Child::className(), ['childContactRelationship_id' => 'id']);
    }
}
