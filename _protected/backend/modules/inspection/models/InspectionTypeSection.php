<?php

namespace backend\modules\inspection\models;

use Yii;

/**
 * This is the model class for table "{{%inspection_typeSection}}".
 *
 * @property int $id
 * @property int $inspection_id
 * @property int $section_id
 * @property int $created_by
 * @property string $created_on
 *
 * @property InspectionInspection $inspection
 * @property InspectionSection $section
 * @property User $createdBy
 */
class InspectionTypeSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%inspection_typeSection}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['inspection_id', 'section_id', 'created_by'], 'integer'],
            [['created_on'], 'safe'],
            [['inspection_id'], 'exist', 'skipOnError' => true, 'targetClass' => InspectionInspection::className(), 'targetAttribute' => ['inspection_id' => 'id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => InspectionSection::className(), 'targetAttribute' => ['section_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'inspection_id' => Yii::t('app', 'Inspection'),
            'section_id' => Yii::t('app', 'Section'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_on' => Yii::t('app', 'Created On'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspection()
    {
        return $this->hasOne(InspectionInspection::className(), ['id' => 'inspection_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(InspectionSection::className(), ['id' => 'section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
