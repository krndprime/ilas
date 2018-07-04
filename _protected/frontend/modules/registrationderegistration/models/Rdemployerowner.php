<?php

namespace backend\modules\registrationderegistration\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "{{%rd_employerowner}}".
 *
 * @property int $id
 * @property int $person_id
 * @property int $employer_id
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
 * @property RdPerson $person
 * @property RdEmployer $employer
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 */
class Rdemployerowner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%rd_employerowner}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'employer_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['startDate', 'endDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdperson::className(), 'targetAttribute' => ['person_id' => 'id']],
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
            'person_id' => Yii::t('app', 'Person ID'),
            'employer_id' => Yii::t('app', 'Employer ID'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
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
    public function getPerson()
    {
        return $this->hasOne(Rdperson::className(), ['id' => 'person_id']);
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
}
