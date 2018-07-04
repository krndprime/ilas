<?php

namespace backend\modules\inspection\models;

use Yii;

/**
 * This is the model class for table "{{%s_noyes}}".
 *
 * @property int $id
 * @property string $noyes
 *
 * @property OshInjury[] $oshInjuries
 * @property OshInjury[] $oshInjuries0
 * @property SocialCelloctivebargainingagreement[] $socialCelloctivebargainingagreements
 * @property SocialTradeunion[] $socialTradeunions
 */
class SNoyes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_noyes}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['noyes'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'noyes' => Yii::t('app', 'Noyes'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOshInjuries()
    {
        return $this->hasMany(OshInjury::className(), ['affiliatedToRssb_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOshInjuries0()
    {
        return $this->hasMany(OshInjury::className(), ['oshTrainingRelatedToOccupation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialCelloctivebargainingagreements()
    {
        return $this->hasMany(SocialCelloctivebargainingagreement::className(), ['isThereCollectiveBargainingAgreement_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialTradeunions()
    {
        return $this->hasMany(SocialTradeunion::className(), ['registeredByMIFOTRA_id' => 'id']);
    }
}
