<?php

namespace backend\modules\socialdialogue\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "{{%social_participatingtradeunion}}".
 *
 * @property int $id
 * @property int $collectiveBargainingAgreement_id collective agreement reference
 * @property int $tradeunion_id trade union participating in setting Agreement
 * @property int $createdBy User who created this entry
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy user whc deleted this entry
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy user who updated this entry
 * @property string $updatedOn
 *
 * @property SocialTradeunion $tradeunion
 * @property SocialCelloctivebargainingagreement $collectiveBargainingAgreement
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 */
class Socialparticipatingtradeunion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%social_participatingtradeunion}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['collectiveBargainingAgreement_id', 'tradeunion_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['tradeunion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Socialtradeunion::className(), 'targetAttribute' => ['tradeunion_id' => 'id']],
            [['collectiveBargainingAgreement_id'], 'exist', 'skipOnError' => true, 'targetClass' => Socialcelloctivebargainingagreement::className(), 'targetAttribute' => ['collectiveBargainingAgreement_id' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'collectiveBargainingAgreement_id' => Yii::t('app', 'Collective bargaining agreement ID'),
            'tradeunion_id' => Yii::t('app', 'Trade union'),
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
    public function getTradeunion()
    {
        return $this->hasOne(Socialtradeunion::className(), ['id' => 'tradeunion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollectiveBargainingAgreement()
    {
        return $this->hasOne(Socialcelloctivebargainingagreement::className(), ['id' => 'collectiveBargainingAgreement_id']);
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
}
