<?php

namespace backend\modules\labourdispute\models;

use Yii;
use common\models\User;
use backend\models\Saccuser;
use backend\models\Sdisputeactiontaken;
use backend\models\Scasestatus;
use backend\modules\registrationderegistration\models\Rdperson;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\modules\socialdialogue\models\Socialtradeunion;
use backend\models\Sdisputecasetype;

/**
 * This is the model class for table "{{%dispute_case}}".
 *
 * @property int $id
 * @property int $employer_id
 * @property int $employee_id
 * @property int $tradeUnion_id
 * @property int $accuser_id
 * @property int $casetype_id
 * @property string $description
 * @property string $submissionDate
 * @property int $caseStatus_id
 * @property int $disputeActionTaken_id
 * @property string $settlementDate
 * @property string $summoningDate
 * @property string $appearanceDate
 * @property string $observation
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 * @property Rdemployer $employer
 * @property Socialtradeunion $tradeUnion
 * @property Sdisputecasetype $casetype
 * @property Saccuser $accuser
 * @property Sdisputeactiontaken $disputeActionTaken
 * @property Scasestatus $caseStatus
 * @property Rdperson $employee
 * @property DisputeNote[] $disputeNotes
 */
class Disputecase extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dispute_case}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employer_id', 'employee_id', 'tradeUnion_id', 'accuser_id', 'casetype_id', 'caseStatus_id', 'disputeActionTaken_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['description', 'observation', 'deleteReason'], 'string'],
            [['submissionDate', 'settlementDate', 'summoningDate', 'appearanceDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['accuser_id','casetype_id','description','submissionDate','caseStatus_id'], 'required'],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
            [['employer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdemployer::className(), 'targetAttribute' => ['employer_id' => 'id']],
            [['tradeUnion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Socialtradeunion::className(), 'targetAttribute' => ['tradeUnion_id' => 'id']],
            [['casetype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sdisputecasetype::className(), 'targetAttribute' => ['casetype_id' => 'id']],
            [['accuser_id'], 'exist', 'skipOnError' => true, 'targetClass' => Saccuser::className(), 'targetAttribute' => ['accuser_id' => 'id']],
            [['disputeActionTaken_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sdisputeactiontaken::className(), 'targetAttribute' => ['disputeActionTaken_id' => 'id']],
            [['caseStatus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Scasestatus::className(), 'targetAttribute' => ['caseStatus_id' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdperson::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'employer_id' => Yii::t('app', 'Employer'), 
            'employee_id' => Yii::t('app', 'Employee'),  
            'tradeUnion_id' => Yii::t('app', 'Trade union'),
            'accuser_id' => Yii::t('app', 'Accuser'),
            'casetype_id' => Yii::t('app', 'Case type'),
            'description' => Yii::t('app', 'Description'),
            'submissionDate' => Yii::t('app', 'Submission date'),
            'caseStatus_id' => Yii::t('app', 'Case status'),
            'disputeActionTaken_id' => Yii::t('app', 'Action taken'),
            'settlementDate' => Yii::t('app', 'Settlement date'),
            'summoningDate' => Yii::t('app', 'Summoning date'),
            'appearanceDate' => Yii::t('app', 'Appearance date'),
            'observation' => Yii::t('app', 'Observation'),
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
    public function getEmployer()
    {
        return $this->hasOne(Rdemployer::className(), ['id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTradeUnion()
    {
        return $this->hasOne(Socialtradeunion::className(), ['id' => 'tradeUnion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCasetype()
    {
        return $this->hasOne(Sdisputecasetype::className(), ['id' => 'casetype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccuser()
    {
        return $this->hasOne(Saccuser::className(), ['id' => 'accuser_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisputeActionTaken()
    {
        return $this->hasOne(Sdisputeactiontaken::className(), ['id' => 'disputeActionTaken_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaseStatus()
    {
        return $this->hasOne(Scasestatus::className(), ['id' => 'caseStatus_id']);
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
    public function getDisputeNotes()
    {
        return $this->hasMany(Disputenote::className(), ['case_id' => 'id']);
    }
}
