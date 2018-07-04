<?php

namespace backend\modules\socialdialogue\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "{{%social_collectivebargainingamendment}}".
 *
 * @property int $id
 * @property int $collectiveBargainingAgreement_id
 * @property string $collectiveBargainingAmendment
 * @property string $startDate
 * @property string $endDate
 * @property string $Observation
 * @property int $createdBy
 * @property int $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property int $deletedOn
 * @property int $deleteReason
 * @property int $updatedBy
 * @property int $updatedOn
 *
 * @property Socialcelloctivebargainingagreement $collectiveBargainingAgreement
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 */
class Socialcollectivebargainingamendment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%social_collectivebargainingamendment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['collectiveBargainingAgreement_id', 'createdBy', 'createdOn', 'deletedFlag', 'deletedBy', 'deletedOn', 'deleteReason', 'updatedBy', 'updatedOn'], 'integer'],
            [['startDate', 'endDate'], 'safe'],
            [['Observation'], 'string'],
            [['collectiveBargainingAmendment'], 'string', 'max' => 100],
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
            'collectiveBargainingAgreement_id' => Yii::t('app', 'Collective bargaining agreement'),
            'collectiveBargainingAmendment' => Yii::t('app', 'Collective bargaining amendment'),
            'startDate' => Yii::t('app', 'Starting Date'),
            'endDate' => Yii::t('app', 'Ending Date'),
            'Observation' => Yii::t('app', 'Observation'),
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
