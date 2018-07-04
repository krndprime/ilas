<?php

namespace backend\modules\osh\models;

use Yii;
use backend\models\Snoyes;
use backend\models\Sinjurycause;
use backend\models\Sdesease;
use backend\models\Sinjuryfirstaid;
use backend\models\Sfrequency;
use backend\models\Sinjurycategory;
use backend\models\Sinjurypartofthebody;
use backend\models\Sinjurytype;
use backend\modules\registrationderegistration\models\Rdperson;
use common\models\User;
use backend\models\Saccident;

/**
 * This is the model class for table "{{%osh_injuryy}}".
 *
 * @property int $id
 * @property int $employee_id
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
 * @property int $affiliatedToRssb_id
 * @property string $rssbNumber
 * @property string $observation
 * @property int $reported
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property SInjurytype $injuryType
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 * @property RdPerson $employee
 * @property SAccident $accident
 * @property SFrequency $frequency
 * @property SDesease $desease
 * @property SInjurycategory $injuryCategory
 * @property SInjurypartofthebody $partOfTheBody
 * @property SInjurycause $cause
 * @property SNoyes $oshTrainingRelatedToOccupation
 * @property SNoyes $affiliatedToRssb
 */
class Oshinjuryy extends \yii\db\ActiveRecord
{
    public $actiontaken;
    public $preventivemeasure;
    public $sanction;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%osh_injuryy}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'injuryType_id', 'frequency_id', 'desease_id', 'accident_id', 'injuryCategory_id', 'partOfTheBody_id', 'cause_id', 'oshTrainingRelatedToOccupation_id', 'affiliatedToRssb_id', 'reported', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['injuryDate', 'returnToWorkDate', 'createdOn', 'deletedOn', 'updatedOn','preventivemeasure', 'actiontaken'], 'safe'],
            [['observation', 'deleteReason'], 'string'],
            [['rssbNumber'], 'string', 'max' => 10],
            [['injuryType_id','frequency_id','injuryCategory_id','partOfTheBody_id','cause_id','oshTrainingRelatedToOccupation_id','injuryDate','affiliatedToRssb_id','actiontaken'], 'required'],
            [['injuryType_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sinjurytype::className(), 'targetAttribute' => ['injuryType_id' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdperson::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['accident_id'], 'exist', 'skipOnError' => true, 'targetClass' => Saccident::className(), 'targetAttribute' => ['accident_id' => 'id']],
            [['frequency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sfrequency::className(), 'targetAttribute' => ['frequency_id' => 'id']],
            [['desease_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sdesease::className(), 'targetAttribute' => ['desease_id' => 'id']],
            [['injuryCategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sinjurycategory::className(), 'targetAttribute' => ['injuryCategory_id' => 'id']],
            [['partOfTheBody_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sinjurypartofthebody::className(), 'targetAttribute' => ['partOfTheBody_id' => 'id']],
            [['cause_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sinjurycause::className(), 'targetAttribute' => ['cause_id' => 'id']],
            [['oshTrainingRelatedToOccupation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Snoyes::className(), 'targetAttribute' => ['oshTrainingRelatedToOccupation_id' => 'id']],
            [['affiliatedToRssb_id'], 'exist', 'skipOnError' => true, 'targetClass' => Snoyes::className(), 'targetAttribute' => ['affiliatedToRssb_id' => 'id']],
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
            'injuryType_id' => Yii::t('app', 'Injury type'),
            'frequency_id' => Yii::t('app', 'Frequency'),
            'desease_id' => Yii::t('app', 'Desease'),
            'accident_id' => Yii::t('app', 'Accident'),
            'injuryCategory_id' => Yii::t('app', 'Injury category'),
            'partOfTheBody_id' => Yii::t('app', 'Part of the body affected'),
            'cause_id' => Yii::t('app', 'Cause'),
            'oshTrainingRelatedToOccupation_id' => Yii::t('app', 'OSH training related to occupation?'),
            'injuryDate' => Yii::t('app', 'Injury date'),
            'returnToWorkDate' => Yii::t('app', 'Return to work date'),
            'affiliatedToRssb_id' => Yii::t('app', 'Is the staff affiliated to RSSB?'),
            'rssbNumber' => Yii::t('app', 'Staff RSSB number'),
            'observation' => Yii::t('app', 'Observation'),
            'createdBy' => Yii::t('app', 'Created by'),
            'createdOn' => Yii::t('app', 'Created on'),
            'deletedFlag' => Yii::t('app', 'Deleted flag'),
            'deletedBy' => Yii::t('app', 'Deleted by'),
            'deletedOn' => Yii::t('app', 'Deleted on'),
            'deleteReason' => Yii::t('app', 'Delete reason'),
            'updatedBy' => Yii::t('app', 'Updated by'),
            'updatedOn' => Yii::t('app', 'Updated on'),
            'actiontaken' => Yii::t('app', 'Action taken'),
            'preventivemeasure' => Yii::t('app', 'Preventive measure'),
            'sanction' => Yii::t('app', 'Sanction list'),

        ];
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
    public function getEmployee()
    {
        return $this->hasOne(Rdperson::className(), ['id' => 'employee_id']);
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
    public function getAffiliatedToRssb()
    {
        return $this->hasOne(Snoyes::className(), ['id' => 'affiliatedToRssb_id']);
    }
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getOshPreventivemeasures()
    {
        return $this->hasMany(Oshpreventivemeasure::className(), ['oshinjury_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOshActiontakens()
    {
        return $this->hasMany(Oshactiontaken::className(), ['oshinjury_id' => 'id']);
    }
}
