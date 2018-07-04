<?php

namespace backend\modules\socialdialogue\models;

use Yii;
use common\models\User;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\models\Sbargainingagreementstatus;

/**
 * This is the model class for table "{{%social_celloctivebargainingagreement}}".
 *
 * @property int $id
 * @property int $company_id
 * @property string $collectiveBargainingAgreement
 * @property int $bargainingagreementstatus_id
 * @property string $startDate
 * @property string $endDate
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFrag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deletedReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property SBargainingagreementstatus $bargainingagreementstatus
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 * @property RdEmployer $company
 * @property SocialParticipatingtradeunion[] $socialParticipatingtradeunions
 */
class Socialcelloctivebargainingagreement extends \yii\db\ActiveRecord
{
    public $tradeunion;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%social_celloctivebargainingagreement}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'bargainingagreementstatus_id', 'createdBy', 'deletedFrag', 'deletedBy', 'updatedBy'], 'integer'],            
            [['startDate', 'endDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['deletedReason'], 'string'],
            [['collectiveBargainingAgreement'], 'string', 'max' => 255],
            [['bargainingagreementstatus_id','tradeunion','startDate'], 'required'],
            [['bargainingagreementstatus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sbargainingagreementstatus::className(), 'targetAttribute' => ['bargainingagreementstatus_id' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdemployer::className(), 'targetAttribute' => ['company_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'company_id' => Yii::t('app', 'Establishment'),
            'collectiveBargainingAgreement' => Yii::t('app', 'Collective bargaining agreement'),            
            'bargainingagreementstatus_id' => Yii::t('app', 'Status'),
            'startDate' => Yii::t('app', 'Starting date'),
            'endDate' => Yii::t('app', 'Ending date'),
            'createdBy' => Yii::t('app', 'Created by'),
            'createdOn' => Yii::t('app', 'Created on'),
            'deletedFrag' => Yii::t('app', 'Deleted frag'),
            'deletedBy' => Yii::t('app', 'Deleted by'),
            'deletedOn' => Yii::t('app', 'Deleted on'),
            'deletedReason' => Yii::t('app', 'Deleted reason'),
            'updatedBy' => Yii::t('app', 'Updated by'),
            'updatedOn' => Yii::t('app', 'Updated on'),
            'tradeunion' => Yii::t('app', 'Trade union'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBargainingagreementstatus()
    {
        return $this->hasOne(SBargainingagreementstatus::className(), ['id' => 'bargainingagreementstatus_id']);
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
    public function getCompany()
    {
        return $this->hasOne(RdEmployer::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialParticipatingtradeunions()
    {
        return $this->hasMany(Socialparticipatingtradeunion::className(), ['collectiveBargainingAgreement_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialCollectivebargainingamendments()
    {
        return $this->hasMany(Socialcollectivebargainingamendment::className(), ['collectiveBargainingAgreement_id' => 'id']);
    }
}
