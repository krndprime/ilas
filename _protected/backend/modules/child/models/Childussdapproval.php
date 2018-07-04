<?php

namespace backend\modules\child\models;

use Yii;
use backend\models\Schildussdaction;
use common\models\User;

/**
 * This is the model class for table "{{%child_ussdapproval}}".
 *
 * @property int $id
 * @property int $childUssd_id
 * @property string $comment
 * @property int $childUssdAction_id
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property SChildussdaction $childUssdAction
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 * @property ChildUssd $childUssd
 */
class Childussdapproval extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%child_ussdapproval}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['childUssd_id', 'childUssdAction_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['comment', 'deleteReason'], 'string'],
            [['createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['childUssdAction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schildussdaction::className(), 'targetAttribute' => ['childUssdAction_id' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
            [['childUssd_id'], 'exist', 'skipOnError' => true, 'targetClass' => Childussd::className(), 'targetAttribute' => ['childUssd_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'childUssd_id' => Yii::t('app', 'USSD reference number'),
            'comment' => Yii::t('app', 'Comment'),
            'childUssdAction_id' => Yii::t('app', 'Decision'),
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
    public function getChildUssdAction()
    {
        return $this->hasOne(Schildussdaction::className(), ['id' => 'childUssdAction_id']);
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
    public function getChildUssd()
    {
        return $this->hasOne(Childussd::className(), ['id' => 'childUssd_id']);
    }
}
