<?php

namespace backend\modules\registrationderegistration\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "{{%rd_employerNumberofemployee}}".
 *
 * @property int $id
 * @property int $employer_id
 * @property int $numberOfFemaleEmployee
 * @property int $numberOfMaleemployee
 * @property int $createdBy
 * @property int $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property Rdemployer $employer
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 */
class Rdemployernumberofemployee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%rd_employerNumberofemployee}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employer_id', 'numberOfFemaleEmployee', 'numberOfMaleemployee', 'createdBy', 'createdOn', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['deletedOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['numberOfFemaleEmployee','numberOfMaleemployee'], 'required'],
            [['employer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdemployer::className(), 'targetAttribute' => ['employer_id' => 'id']],
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
            'employer_id' => Yii::t('app', 'Employer'),
            'numberOfFemaleEmployee' => Yii::t('app', 'Number of female employees'),
            'numberOfMaleemployee' => Yii::t('app', 'Number of male employees'),
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
    public function getEmployer()
    {
        return $this->hasOne(Rdemployer::className(), ['id' => 'employer_id']);
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
    public function numberofemployees($id)
    {
        return Rdemployernumberofemployee::find()->where('employer_id=:u',['u'=>$id])->all();
        
    }
}
