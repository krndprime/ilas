<?php

namespace backend\modules\labourdispute\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "{{%dispute_note}}".
 *
 * @property int $id
 * @property int $case_id
 * @property string $summoningDate
 * @property string $note
 * @property string $nextSummoningDate
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property DisputeAttachment[] $disputeAttachments
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 * @property Disputecase $case
 */
class Disputenote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dispute_note}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['case_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['summoningDate', 'nextSummoningDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],            
            [['deleteReason'], 'string'],
            [['note'], 'string'],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
            [['case_id'], 'exist', 'skipOnError' => true, 'targetClass' => Disputecase::className(), 'targetAttribute' => ['case_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'case_id' => Yii::t('app', 'Case'),
            'summoningDate' => Yii::t('app', 'Summoning date'),
            'note' => Yii::t('app', 'Note'),
            'nextSummoningDate' => Yii::t('app', 'Appearance date'),
            'createdBy' => Yii::t('app', 'Created by'),
            'createdOn' => Yii::t('app', 'Created on'),
            'deletedFlag' => Yii::t('app', 'Deleted flag'),
            'deletedBy' => Yii::t('app', 'Deleted by'),
            'deletedOn' => Yii::t('app', 'Deleted on'),
            'deleteReason' => Yii::t('app', 'Delete reason'),
            'updatedBy' => Yii::t('app', 'Updated by'),
            'updatedOn' => Yii::t('app', 'Updated on'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisputeAttachments()
    {
        return $this->hasMany(DisputeAttachment::className(), ['disputeNote_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'createdBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeletedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'deletedBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'updatedBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCase()
    {
        return $this->hasOne(Disputecase::className(), ['id' => 'case_id']);
    }
}
