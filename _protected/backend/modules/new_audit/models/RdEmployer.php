<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%rd_employer}}".
 *
 * @property int $id
 * @property string $companyName
 * @property int $employerType_id
 * @property string $dateOfRegistration
 * @property string $tin
 * @property string $rssbNumber
 * @property int $village_id
 * @property int $ownership_id
 * @property string $address
 * @property int $numberOfFemaleEmployee
 * @property int $numberOfMaleemployee
 * @property int $employerStatus_id
 * @property string $statusEffectiveDate
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property AuditAnswer[] $auditAnswers
 * @property AuditAnswerinfo[] $auditAnswerinfos
 * @property ChildEmployment[] $childEmployments
 * @property DisputeCase[] $disputeCases
 * @property RdEmployee[] $rdEmployees
 * @property SEmployertype $employerType
 * @property SVillage $village
 * @property SOwnership $ownership
 * @property SEmployerStatus $employerStatus
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 * @property RdEmployerecosector[] $rdEmployerecosectors
 * @property RdEmployerrepresentative[] $rdEmployerrepresentatives
 */
class RdEmployer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%rd_employer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companyName'], 'required'],
            [['employerType_id', 'village_id', 'ownership_id', 'numberOfFemaleEmployee', 'numberOfMaleemployee', 'employerStatus_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['dateOfRegistration', 'statusEffectiveDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['companyName'], 'string', 'max' => 45],
            [['tin', 'rssbNumber'], 'string', 'max' => 10],
            [['address'], 'string', 'max' => 255],
            [['companyName'], 'unique'],
            [['employerType_id'], 'exist', 'skipOnError' => true, 'targetClass' => SEmployertype::className(), 'targetAttribute' => ['employerType_id' => 'id']],
            [['village_id'], 'exist', 'skipOnError' => true, 'targetClass' => SVillage::className(), 'targetAttribute' => ['village_id' => 'id']],
            [['ownership_id'], 'exist', 'skipOnError' => true, 'targetClass' => SOwnership::className(), 'targetAttribute' => ['ownership_id' => 'id']],
            [['employerStatus_id'], 'exist', 'skipOnError' => true, 'targetClass' => SEmployerStatus::className(), 'targetAttribute' => ['employerStatus_id' => 'id']],
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
            'companyName' => Yii::t('app', 'Company Name'),
            'employerType_id' => Yii::t('app', 'Employer Type'),
            'dateOfRegistration' => Yii::t('app', 'Date Of Registration'),
            'tin' => Yii::t('app', 'Tin'),
            'rssbNumber' => Yii::t('app', 'Rssb Number'),
            'village_id' => Yii::t('app', 'Village'),
            'ownership_id' => Yii::t('app', 'Ownership'),
            'address' => Yii::t('app', 'Address'),
            'numberOfFemaleEmployee' => Yii::t('app', 'Number Of Female Employee'),
            'numberOfMaleemployee' => Yii::t('app', 'Number Of Maleemployee'),
            'employerStatus_id' => Yii::t('app', 'Employer Status'),
            'statusEffectiveDate' => Yii::t('app', 'Status Effective Date'),
            'createdBy' => Yii::t('app', 'Created By'),
            'createdOn' => Yii::t('app', 'Created On'),
            'deletedFlag' => Yii::t('app', 'Deleted Flag'),
            'deletedBy' => Yii::t('app', 'Deleted By'),
            'deletedOn' => Yii::t('app', 'Deleted On'),
            'deleteReason' => Yii::t('app', 'Delete Reason'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'updatedOn' => Yii::t('app', 'Updated On'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditAnswers()
    {
        return $this->hasMany(AuditAnswer::className(), ['establishment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditAnswerinfos()
    {
        return $this->hasMany(AuditAnswerinfo::className(), ['establishment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildEmployments()
    {
        return $this->hasMany(ChildEmployment::className(), ['employer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisputeCases()
    {
        return $this->hasMany(DisputeCase::className(), ['employer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdEmployees()
    {
        return $this->hasMany(RdEmployee::className(), ['employer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployerType()
    {
        return $this->hasOne(SEmployertype::className(), ['id' => 'employerType_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVillage()
    {
        return $this->hasOne(SVillage::className(), ['id' => 'village_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwnership()
    {
        return $this->hasOne(SOwnership::className(), ['id' => 'ownership_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployerStatus()
    {
        return $this->hasOne(SEmployerStatus::className(), ['id' => 'employerStatus_id']);
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
    public function getRdEmployerecosectors()
    {
        return $this->hasMany(RdEmployerecosector::className(), ['employer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdEmployerrepresentatives()
    {
        return $this->hasMany(RdEmployerrepresentative::className(), ['person_id' => 'id']);
    }
}
