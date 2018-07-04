<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_injurycategory}}".
 *
 * @property int $id
 * @property string $category
 *
 * @property OshInjury[] $oshInjuries
 */
class Sinjurycategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_injurycategory}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', 'Category'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOshInjuries()
    {
        return $this->hasMany(OshInjury::className(), ['injuryCategory_id' => 'id']);
    }
}
