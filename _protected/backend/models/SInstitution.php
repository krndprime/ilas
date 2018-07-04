<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_institution}}".
 *
 * @property int $id
 * @property string $institution
 * @property int $level_id
 *
 * @property SLevel $level
 */
class SInstitution extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_institution}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['institution', 'level_id'], 'required'],
            [['level_id'], 'integer'],
            [['institution'], 'string', 'max' => 255],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => SLevel::className(), 'targetAttribute' => ['level_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'institution' => Yii::t('app', 'Institution'),
            'level_id' => Yii::t('app', 'Level ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(SLevel::className(), ['id' => 'level_id']);
    }
}
