<?php

namespace backend\modules\socialdialogue\models;

use Yii;
use common\models\User;
use backend\modules\registrationderegistration\models\Rdemployer;

/**
 * This is the model class for table "{{%social_visitedcompany}}".
 *
 * @property int $id
 * @property int $company_id
 * @property int $tradeUnion_id
 * @property string $startDate
 * @property string $endDate
 * @property int $numberOfFemaleMember
 * @property int $numberOfMaleMember
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property Rdemployer $company
 * @property Socialtradeunion $tradeUnion
 * @property User $updatedBy0
 * @property User $deletedBy0
 * @property User $createdBy0
 */
class Socialvisitedcompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%social_visitedcompany}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id'], 'required'],
            [['company_id', 'tradeUnion_id', 'numberOfFemaleMember', 'numberOfMaleMember', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['startDate', 'endDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdemployer::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['tradeUnion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Socialtradeunion::className(), 'targetAttribute' => ['tradeUnion_id' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'company_id' => Yii::t('app', 'Establishment'),
            'tradeUnion_id' => Yii::t('app', 'Trade union'),
            'startDate' => Yii::t('app', 'Trade union starting Date'),
            'endDate' => Yii::t('app', 'Trade union ending Date'),
            'numberOfFemaleMember' => Yii::t('app', 'Number of female members'),
            'numberOfMaleMember' => Yii::t('app', 'Number of male members'),
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
    public function getSocialCelloctivebargainingagreements()
    {
        return $this->hasMany(Socialcelloctivebargainingagreement::className(), ['visitedCompany_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Rdemployer::className(), ['id' => 'company_id']);
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
    public function getUpdatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'updatedBy']);
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
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'createdBy']);
    }
}
