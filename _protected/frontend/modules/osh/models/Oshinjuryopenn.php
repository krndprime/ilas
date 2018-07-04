<?php

namespace frontend\modules\osh\models;

use Yii;
use backend\models\Saccident;
use backend\models\Sinjurycategory;
use backend\models\Sinjurypartofthebody;
use backend\models\Sinjurycause;
use backend\models\Snoyes;
use backend\models\Sisco08level4;
use backend\models\Sinjurytype;
use backend\models\Sfrequency;
use backend\models\Sdesease;
use common\models\User;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\modules\registrationderegistration\models\Rdperson;

/**
 * This is the model class for table "{{%osh_injuryopenn}}".
 *
 * @property int $id
 * @property int $employee_id
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
 * @property RdPerson $employee
 * @property SInjurypartofthebody $partOfTheBody
 * @property SInjurycause $cause
 * @property SNoyes $oshTrainingRelatedToOccupation
 * @property RdEmployer $employer
 * @property SIsco08Level4 $occupation
 * @property SInjurytype $injuryType
 * @property User $deletedBy0
 * @property User $updatedBy0
 * @property SFrequency $frequency
 * @property SDesease $desease
 * @property SInjurycategory $injuryCategory
 */
class Oshinjuryopenn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%osh_injuryopenn}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'occupation_id', 'experienceInThisEstablishment', 'startDate'], 'required'],
            [['employee_id', 'employer_id', 'occupation_id', 'experienceInThisEstablishment', 'injuryType_id', 'frequency_id', 'desease_id', 'accident_id', 'injuryCategory_id', 'partOfTheBody_id', 'cause_id', 'oshTrainingRelatedToOccupation_id', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['startDate', 'endDate', 'injuryDate', 'returnToWorkDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['observation', 'deleteReason'], 'string'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdperson::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['partOfTheBody_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sinjurypartofthebody::className(), 'targetAttribute' => ['partOfTheBody_id' => 'id']],
            [['cause_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sinjurycause::className(), 'targetAttribute' => ['cause_id' => 'id']],
            [['oshTrainingRelatedToOccupation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Snoyes::className(), 'targetAttribute' => ['oshTrainingRelatedToOccupation_id' => 'id']],
            [['employer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdemployer::className(), 'targetAttribute' => ['employer_id' => 'id']],
            [['occupation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sisco08level4::className(), 'targetAttribute' => ['occupation_id' => 'id']],
            [['injuryType_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sinjurytype::className(), 'targetAttribute' => ['injuryType_id' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
            [['frequency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sfrequency::className(), 'targetAttribute' => ['frequency_id' => 'id']],
            [['desease_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sdesease::className(), 'targetAttribute' => ['desease_id' => 'id']],
            [['injuryCategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sinjurycategory::className(), 'targetAttribute' => ['injuryCategory_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'employee_id' => Yii::t('app', 'Employee'),
            'employer_id' => Yii::t('app', 'Establishment'),
            'occupation_id' => Yii::t('app', 'Occupation'),
            'experienceInThisEstablishment' => Yii::t('app', 'Experience in this Establishment'),
            'startDate' => Yii::t('app', 'Start date'),
            'endDate' => Yii::t('app', 'End date'),
            'injuryType_id' => Yii::t('app', 'Injury type'),
            'frequency_id' => Yii::t('app', 'Frequency'),
            'desease_id' => Yii::t('app', 'Desease'),
            'accident_id' => Yii::t('app', 'Accident'),
            'injuryCategory_id' => Yii::t('app', 'Injury category'),
            'partOfTheBody_id' => Yii::t('app', 'Part of the body'),
            'cause_id' => Yii::t('app', 'Cause'),
            'oshTrainingRelatedToOccupation_id' => Yii::t('app', 'OSH training related to occupation'),
            'injuryDate' => Yii::t('app', 'Injury date'),
            'returnToWorkDate' => Yii::t('app', 'Return to work date'),
            'observation' => Yii::t('app', 'Observation'),
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
    public function getEmployee()
    {
        return $this->hasOne(Rdperson::className(), ['id' => 'employee_id']);
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
}
