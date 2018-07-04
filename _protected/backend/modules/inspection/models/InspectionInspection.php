<?php

namespace backend\modules\inspection\models;

use Yii;

/**
 * This is the model class for table "{{%inspection_inspection}}".
 *
 * @property int $id
 * @property string $name
 * @property string $year
 * @property int $month
 * @property int $created_by
 * @property string $created_on
 * @property int $status_id
 *
 * @property InspectionAnswer[] $inspectionAnswers
 * @property SActive $status
 * @property User $createdBy
 * @property InspectionTypeSection[] $inspectionTypeSections
 */
class InspectionInspection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $section;
    
    public static function tableName()
    {
        return '{{%inspection_inspection}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'year', 'month', 'created_by', 'created_on', 'status_id','section'], 'required'],
            [['year', 'created_on'], 'safe'],
            [['month', 'created_by', 'status_id'], 'integer'],
            [['name'], 'string', 'max' => 300],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => SActive::className(), 'targetAttribute' => ['status_id' => 'id']],
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
            'name' => Yii::t('app', 'Name'),
            'year' => Yii::t('app', 'Year'),
            'month' => Yii::t('app', 'Month'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_on' => Yii::t('app', 'Created On'),
            'status_id' => Yii::t('app', 'Status ID'),
            'section' => Yii::t('app','Section'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectionAnswers()
    {
        return $this->hasMany(InspectionAnswer::className(), ['inspection_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(SActive::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectionTypeSections()
    {
        return $this->hasMany(InspectionTypeSection::className(), ['inspection_id' => 'id']);
    }
}
