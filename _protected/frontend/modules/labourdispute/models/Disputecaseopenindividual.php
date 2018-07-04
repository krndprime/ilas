<?php

namespace frontend\modules\labourdispute\models;

use Yii;
use common\models\User;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\modules\registrationderegistration\models\Rdperson;
use backend\models\Sisco08level4;

/**
 * This is the model class for table "{{%dispute_caseopenindividual}}".
 *
 * @property int $id
 * @property int $employee_id
 * @property int $employer_id
 * @property int $occupation_id
 * @property int $experienceInThisEstablishment
 * @property string $startDate
 * @property string $endDate
 * @property string $description
 * @property string $submissionDate
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
 * @property RdEmployer $employer
 * @property SIsco08Level4 $occupation
 * @property User $deletedBy0
 * @property User $updatedBy0
 */
class Disputecaseopenindividual extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dispute_caseopenindividual}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'occupation_id', 'experienceInThisEstablishment', 'startDate'], 'required'],
            [['employee_id', 'employer_id', 'occupation_id', 'experienceInThisEstablishment', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['startDate', 'endDate', 'submissionDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['description', 'observation', 'deleteReason'], 'string'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdperson::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['employer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdemployer::className(), 'targetAttribute' => ['employer_id' => 'id']],
            [['occupation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sisco08level4::className(), 'targetAttribute' => ['occupation_id' => 'id']],
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
            'employee_id' => Yii::t('app', 'Employee'),
            'employer_id' => Yii::t('app', 'Establishment'),
            'occupation_id' => Yii::t('app', 'Occupation'),
            'experienceInThisEstablishment' => Yii::t('app', 'Experience in this Establishment'),
            'startDate' => Yii::t('app', 'Start date'),
            'endDate' => Yii::t('app', 'End date'),
            'description' => Yii::t('app', 'Case description'),
            'submissionDate' => Yii::t('app', 'Case submission date'),
            'observation' => Yii::t('app', 'Case details'),
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
