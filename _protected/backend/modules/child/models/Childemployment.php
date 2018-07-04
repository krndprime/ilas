<?php

namespace backend\modules\child\models;

use Yii;
use backend\modules\child\models\Child;
use backend\models\Sisco08level4;
use common\models\User;
use backend\models\Semployertype;


use backend\modules\registrationderegistration\models\Rdemployer;
use backend\modules\child\models\Childemployer;

/**
 * This is the model class for table "{{%child_employment}}".
 *
 * @property int $id
 * @property int $employerType_id
 * @property int $employer_id
 * @property int $child_id
 * @property int $occupation_id
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
 * @property ChildCase[] $childCases
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 * @property SEmployertype $employerType
 * @property Child $child
 * @property SIsco08Level4 $occupation
 */
class Childemployment extends \yii\db\ActiveRecord
{
    public $employer_idd;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%child_employment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employerType_id'], 'required'],
            [['employerType_id', 'employer_id','employer_idd','child_id', 'occupation_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['startDate', 'endDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
            [['employerType_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semployertype::className(), 'targetAttribute' => ['employerType_id' => 'id']],
            [['child_id'], 'exist', 'skipOnError' => true, 'targetClass' => Child::className(), 'targetAttribute' => ['child_id' => 'id']],
            [['occupation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sisco08level4::className(), 'targetAttribute' => ['occupation_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'employerType_id' => Yii::t('app', 'Employer type'),
            'employer_id' => Yii::t('app', 'Employer'),
            'child_id' => Yii::t('app', 'Child'),
            'occupation_id' => Yii::t('app', 'Occupation'),
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
            'employer_idd' => Yii::t('app', 'Employer'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildCases()
    {
        return $this->hasMany(Childcase::className(), ['childEmployment_id' => 'id']);
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
    public function getEmployerType()
    {
        return $this->hasOne(Semployertype::className(), ['id' => 'employerType_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild()
    {
        return $this->hasOne(Child::className(), ['id' => 'child_id']);
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
    public function getFormalemployer()
    {
        return $this->hasOne(Rdemployer::className(), ['id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildemployer()
    {
        return $this->hasOne(Childemployer::className(), ['id' => 'employer_id']);
    }
}
