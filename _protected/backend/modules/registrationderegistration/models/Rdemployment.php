<?php

namespace backend\modules\registrationderegistration\models;

use Yii;
use backend\modules\registrationderegistration\models\Rdemployer;
use backend\models\Sisco08level4;
use common\models\User;


/**
 * This is the model class for table "{{%rd_employment}}".
 *
 * @property int $id
 * @property int $person_id
 * @property int $employer_id
 * @property int $occupation_id
 * @property int $experienceInThisOccupation
 * @property string $startDate
 * @property string $endDate
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property OshInjury[] $oshInjuries
 * @property Rdemployer $employer
 * @property Sisco08level4 $occupation
 * @property Rdperson $person
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 */
class Rdemployment extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%rd_employment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
            [['person_id', 'employer_id', 'occupation_id', 'experienceInThisOccupation', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['startDate', 'endDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['employer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdemployer::className(), 'targetAttribute' => ['employer_id' => 'id']],
            [['employer_id','occupation_id','experienceInThisOccupation','startDate'], 'required'],
            [['occupation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sisco08level4::className(), 'targetAttribute' => ['occupation_id' => 'id']],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdperson::className(), 'targetAttribute' => ['person_id' => 'id']],
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
            'person_id' => Yii::t('app', 'Employer'),
            'employer_id' => Yii::t('app', 'Establishment'),
            'occupation_id' => Yii::t('app', 'Occupation'),
            'experienceInThisOccupation' => Yii::t('app', 'Experience in this establishment (Years)'),
            'startDate' => Yii::t('app', 'Start date'),
            'endDate' => Yii::t('app', 'End date'),
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
    public function getOshInjuries()
    {
        return $this->hasMany(OshInjury::className(), ['employee_id' => 'id']);
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
    public function getPerson()
    {
        return $this->hasOne(Rdperson::className(), ['id' => 'person_id']);
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
