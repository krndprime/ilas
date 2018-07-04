<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_preventivemeasure}}".
 *
 * @property int $id
 * @property string $preventivemeasure
 *
 * @property OshPreventivemeasure[] $oshPreventivemeasures
 */
class Spreventivemeasure extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_preventivemeasure}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['preventivemeasure'], 'required'],
            [['preventivemeasure'], 'string', 'max' => 50],
            [['preventivemeasure'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'preventivemeasure' => Yii::t('app', 'Preventivemeasure'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOshPreventivemeasures()
    {
        return $this->hasMany(OshPreventivemeasure::className(), ['preventivemeasure_id' => 'id']);
    }
}
