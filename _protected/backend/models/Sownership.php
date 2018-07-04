<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_ownership}}".
 *
 * @property int $id
 * @property int $employertype_id
 * @property string $ownership
 *
 * @property RdEmployer[] $rdEmployers
 * @property SEmployertype $employertype
 */
class Sownership extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_ownership}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employertype_id'], 'integer'],
            [['ownership'], 'required'],
            [['ownership'], 'string', 'max' => 45],
            [['employertype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semployertype::className(), 'targetAttribute' => ['employertype_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'employertype_id' => Yii::t('app', 'Employer type'),
            'ownership' => Yii::t('app', 'Ownership'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdEmployers()
    {
        return $this->hasMany(RdEmployer::className(), ['ownership_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployertype()
    {
        return $this->hasOne(SEmployertype::className(), ['id' => 'employertype_id']);
    }
}
