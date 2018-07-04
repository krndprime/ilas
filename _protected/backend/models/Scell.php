<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_cell}}".
 *
 * @property int $id
 * @property string $cell
 * @property int $sector_id
 *
 * @property Child[] $children
 * @property SGeosector $sector
 * @property SVillage[] $sVillages
 */
class Scell extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_cell}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'sector_id'], 'integer'],
            [['cell'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['sector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sgeosector::className(), 'targetAttribute' => ['sector_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cell' => Yii::t('app', 'Cell'),
            'sector_id' => Yii::t('app', 'Sector'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Child::className(), ['originCell_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSector()
    {
        return $this->hasOne(Sgeosector::className(), ['id' => 'sector_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSVillages()
    {
        return $this->hasMany(Svillage::className(), ['cell_id' => 'id']);
    }
}
