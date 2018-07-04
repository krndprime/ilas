<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%audit_questionweight}}".
 *
 * @property int $id
 * @property int $question_id
 * @property int $weight
 * @property int $active_id 0: Not active, 1: Active
 * @property int $created_by
 * @property string $created_on
 *
 * @property AuditQuestion $question
 * @property User $createdBy
 * @property SActive $active
 */
class AuditQuestionweight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%audit_questionweight}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'weight'], 'required'],
            [['question_id', 'weight', 'active_id', 'created_by'], 'integer'],
            [['created_on'], 'safe'],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuditQuestion::className(), 'targetAttribute' => ['question_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['active_id'], 'exist', 'skipOnError' => true, 'targetClass' => SActive::className(), 'targetAttribute' => ['active_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'question_id' => Yii::t('app', 'Question ID'),
            'weight' => Yii::t('app', 'Weight'),
            'active_id' => Yii::t('app', 'Active ID'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_on' => Yii::t('app', 'Created On'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(AuditQuestion::className(), ['id' => 'question_id']);
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
    public function getActive()
    {
        return $this->hasOne(SActive::className(), ['id' => 'active_id']);
    }
}
