<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%audit_option}}".
 *
 * @property int $id
 * @property string $option
 * @property int $question_id
 * @property int $datatype_id
 *
 * @property AuditAnswerinfo[] $auditAnswerinfos
 * @property AuditQuestion $question
 * @property SDatatype $datatype
 */
class AuditOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%audit_option}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['option', 'question_id', 'datatype_id'], 'required'],
            [['question_id', 'datatype_id'], 'integer'],
            [['option'], 'string', 'max' => 255],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuditQuestion::className(), 'targetAttribute' => ['question_id' => 'id']],
            [['datatype_id'], 'exist', 'skipOnError' => true, 'targetClass' => SDatatype::className(), 'targetAttribute' => ['datatype_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'option' => Yii::t('app', 'Option'),
            'question_id' => Yii::t('app', 'Question'),
            'datatype_id' => Yii::t('app', 'Datatype'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditAnswerinfos()
    {
        return $this->hasMany(AuditAnswerinfo::className(), ['option_id' => 'id']);
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
    public function getDatatype()
    {
        return $this->hasOne(SDatatype::className(), ['id' => 'datatype_id']);
    }
}
