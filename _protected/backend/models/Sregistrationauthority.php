<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_registrationauthority}}".
 *
 * @property int $id
 * @property string $registrationauthority
 *
 * @property RdEmployer[] $rdEmployers
 */
class Sregistrationauthority extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_registrationauthority}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registrationauthority'], 'required'],
            [['registrationauthority'], 'string', 'max' => 45],
            [['registrationauthority'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'registrationauthority' => Yii::t('app', 'Registrationauthority'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdEmployers()
    {
        return $this->hasMany(RdEmployer::className(), ['registrationAuthority_id' => 'id']);
    }
}
