<?php

namespace backend\modules\osh\models;

use Yii;
use backend\models\Sdocumenttype;
use backend\models\Saccident;
use backend\models\Sinjurycategory;
use backend\models\Sinjurypartofthebody;
use backend\models\Sinjurycause;
use backend\models\Snoyes;
use backend\models\Scountrycodeiso3166;
use backend\models\Ssex;
use backend\models\Svillage;
use backend\models\Sisco08level4;
use backend\models\Sinjurytype;
use backend\models\Sfrequency;
use backend\models\Sdesease;
use common\models\User;
use backend\modules\registrationderegistration\models\Rdemployer;

/**
 * This is the model class for table "{{%osh_injuryopen}}".
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $middleName
 * @property int $document_id
 * @property string $nid
 * @property int $country_id
 * @property string $dateOfBirth
 * @property int $sex_id
 * @property int $village_id
 * @property string $phone
 * @property string $email
 * @property string $rssbNumber
 * @property int $employer_id
 * @property int $occupation_id
 * @property int $experienceInThisEstablishment
 * @property string $startDate
 * @property string $endDate
 * @property int $injuryType_id
 * @property int $frequency_id
 * @property int $desease_id
 * @property int $accident_id accident types
 * @property int $injuryCategory_id
 * @property int $partOfTheBody_id
 * @property int $cause_id
 * @property int $oshTrainingRelatedToOccupation_id
 * @property string $injuryDate
 * @property string $returnToWorkDate
 * @property string $observation
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property SDocumenttype $document
 * @property SAccident $accident
 * @property SInjurycategory $injuryCategory
 * @property SInjurypartofthebody $partOfTheBody
 * @property SInjurycause $cause
 * @property SNoyes $oshTrainingRelatedToOccupation
 * @property User $deletedBy0
 * @property User $updatedBy0
 * @property SCountrycodeIso3166 $country
 * @property SSex $sex
 * @property SVillage $village
 * @property RdEmployer $employer
 * @property SIsco08Level4 $occupation
 * @property SInjurytype $injuryType
 * @property SFrequency $frequency
 * @property SDesease $desease
 */
class Oshinjuryopen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%osh_injuryopen}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'middleName', 'document_id', 'nid', 'country_id', 'dateOfBirth', 'sex_id', 'village_id', 'phone', 'email', 'occupation_id', 'experienceInThisEstablishment', 'startDate', 'accident_id'], 'required'],
            [['document_id', 'country_id', 'sex_id', 'village_id', 'employer_id', 'occupation_id', 'experienceInThisEstablishment', 'injuryType_id', 'frequency_id', 'desease_id', 'accident_id', 'injuryCategory_id', 'partOfTheBody_id', 'cause_id', 'oshTrainingRelatedToOccupation_id', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['dateOfBirth', 'startDate', 'endDate', 'injuryDate', 'returnToWorkDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['observation', 'deleteReason'], 'string'],
            [['firstName', 'lastName', 'middleName', 'email'], 'string', 'max' => 45],
            [['nid'], 'string', 'max' => 16],
            [['phone'], 'string', 'max' => 15],
            [['rssbNumber'], 'string', 'max' => 10],
            [['document_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sdocumenttype::className(), 'targetAttribute' => ['document_id' => 'id']],
            [['accident_id'], 'exist', 'skipOnError' => true, 'targetClass' => Saccident::className(), 'targetAttribute' => ['accident_id' => 'id']],
            [['injuryCategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sinjurycategory::className(), 'targetAttribute' => ['injuryCategory_id' => 'id']],
            [['partOfTheBody_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sinjurypartofthebody::className(), 'targetAttribute' => ['partOfTheBody_id' => 'id']],
            [['cause_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sinjurycause::className(), 'targetAttribute' => ['cause_id' => 'id']],
            [['oshTrainingRelatedToOccupation_id'], 'exist', 'skipOnError' => true, 'targetClass' => SNoyes::className(), 'targetAttribute' => ['oshTrainingRelatedToOccupation_id' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Scountrycodeiso3166::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['sex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ssex::className(), 'targetAttribute' => ['sex_id' => 'id']],
            [['village_id'], 'exist', 'skipOnError' => true, 'targetClass' => Svillage::className(), 'targetAttribute' => ['village_id' => 'id']],
            [['employer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdemployer::className(), 'targetAttribute' => ['employer_id' => 'id']],
            [['occupation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sisco08level4::className(), 'targetAttribute' => ['occupation_id' => 'id']],
            [['injuryType_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sinjurytype::className(), 'targetAttribute' => ['injuryType_id' => 'id']],
            [['frequency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sfrequency::className(), 'targetAttribute' => ['frequency_id' => 'id']],
            [['desease_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sdesease::className(), 'targetAttribute' => ['desease_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstName' => Yii::t('app', 'First Name'),
            'lastName' => Yii::t('app', 'Last Name'),
            'middleName' => Yii::t('app', 'Middle Name'),
            'document_id' => Yii::t('app', 'Document ID'),
            'nid' => Yii::t('app', 'Nid'),
            'country_id' => Yii::t('app', 'Country ID'),
            'dateOfBirth' => Yii::t('app', 'Date Of Birth'),
            'sex_id' => Yii::t('app', 'Sex ID'),
            'village_id' => Yii::t('app', 'Village ID'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'rssbNumber' => Yii::t('app', 'Rssb Number'),
            'employer_id' => Yii::t('app', 'Employer ID'),
            'occupation_id' => Yii::t('app', 'Occupation ID'),
            'experienceInThisEstablishment' => Yii::t('app', 'Experience In This Establishment'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
            'injuryType_id' => Yii::t('app', 'Injury Type ID'),
            'frequency_id' => Yii::t('app', 'Frequency ID'),
            'desease_id' => Yii::t('app', 'Desease ID'),
            'accident_id' => Yii::t('app', 'Accident ID'),
            'injuryCategory_id' => Yii::t('app', 'Injury Category ID'),
            'partOfTheBody_id' => Yii::t('app', 'Part Of The Body ID'),
            'cause_id' => Yii::t('app', 'Cause ID'),
            'oshTrainingRelatedToOccupation_id' => Yii::t('app', 'Osh Training Related To Occupation ID'),
            'injuryDate' => Yii::t('app', 'Injury Date'),
            'returnToWorkDate' => Yii::t('app', 'Return To Work Date'),
            'observation' => Yii::t('app', 'Observation'),
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
    public function getDocument()
    {
        return $this->hasOne(Sdocumenttype::className(), ['id' => 'document_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccident()
    {
        return $this->hasOne(Saccident::className(), ['id' => 'accident_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInjuryCategory()
    {
        return $this->hasOne(Sinjurycategory::className(), ['id' => 'injuryCategory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartOfTheBody()
    {
        return $this->hasOne(Sinjurypartofthebody::className(), ['id' => 'partOfTheBody_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCause()
    {
        return $this->hasOne(Sinjurycause::className(), ['id' => 'cause_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOshTrainingRelatedToOccupation()
    {
        return $this->hasOne(Snoyes::className(), ['id' => 'oshTrainingRelatedToOccupation_id']);
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
    public function getCountry()
    {
        return $this->hasOne(Scountrycodeiso3166::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSex()
    {
        return $this->hasOne(Ssex::className(), ['id' => 'sex_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVillage()
    {
        return $this->hasOne(Svillage::className(), ['id' => 'village_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployer()
    {
        return $this->hasOne(Rdemployer::className(), ['id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOccupation()
    {
        return $this->hasOne(Sisco08level4::className(), ['id' => 'occupation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInjuryType()
    {
        return $this->hasOne(Sinjurytype::className(), ['id' => 'injuryType_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFrequency()
    {
        return $this->hasOne(Sfrequency::className(), ['id' => 'frequency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesease()
    {
        return $this->hasOne(Sdesease::className(), ['id' => 'desease_id']);
    }
}
