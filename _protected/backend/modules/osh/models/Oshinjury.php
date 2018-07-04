<?php

namespace backend\modules\osh\models;

use Yii;

/**
 * This is the model class for table "{{%osh_injury}}".
 *
 * @property int $id
 * @property int $employee_id
 * @property int $injuryType_id
 * @property int $frequency_id
 * @property int $desease_id
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
 */
class Oshinjury extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%osh_injury}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'injuryType_id', 'frequency_id', 'desease_id', 'injuryCategory_id', 'partOfTheBody_id', 'cause_id', 'oshTrainingRelatedToOccupation_id', 'affiliatedToRssb_id', 'reported', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['injuryDate', 'returnToWorkDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['observation', 'deleteReason'], 'string'],
            [['rssbNumber'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'employee_id' => Yii::t('app', 'Employee ID'),
            'injuryType_id' => Yii::t('app', 'Injury Type ID'),
            'frequency_id' => Yii::t('app', 'Frequency ID'),
            'desease_id' => Yii::t('app', 'Desease ID'),
            'injuryCategory_id' => Yii::t('app', 'Injury Category ID'),
            'partOfTheBody_id' => Yii::t('app', 'Part Of The Body ID'),
            'cause_id' => Yii::t('app', 'Cause ID'),
            'oshTrainingRelatedToOccupation_id' => Yii::t('app', 'Osh Training Related To Occupation ID'),
            'injuryDate' => Yii::t('app', 'Injury Date'),
            'returnToWorkDate' => Yii::t('app', 'Return To Work Date'),
            'affiliatedToRssb_id' => Yii::t('app', 'Affiliated To Rssb ID'),
            'rssbNumber' => Yii::t('app', 'Rssb Number'),
            'observation' => Yii::t('app', 'Observation'),
            'reported' => Yii::t('app', 'Reported'),
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
}
