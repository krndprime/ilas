<?php

namespace backend\modules\osh\models;

use Yii;
use backend\models\Spreventivemeasure;
use common\models\User;

/**
 * This is the model class for table "{{%osh_preventivemeasure}}".
 *
 * @property int $id
 * @property int $oshinjury_id
 * @property int $preventivemeasure_id
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property OshInjury $oshinjury
 * @property SPreventivemeasure $preventivemeasure
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 */
class Oshpreventivemeasure extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%osh_preventivemeasure}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['oshinjury_id', 'preventivemeasure_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['oshinjury_id'], 'exist', 'skipOnError' => true, 'targetClass' => Oshinjury::className(), 'targetAttribute' => ['oshinjury_id' => 'id']],
            [['preventivemeasure_id'], 'exist', 'skipOnError' => true, 'targetClass' => Spreventivemeasure::className(), 'targetAttribute' => ['preventivemeasure_id' => 'id']],
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
            'oshinjury_id' => Yii::t('app', 'OSH reference number'),
            'preventivemeasure_id' => Yii::t('app', 'Preventive measure'),
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
    public function getOshinjury()
    {
        return $this->hasOne(Oshinjury::className(), ['id' => 'oshinjury_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreventivemeasure()
    {
        return $this->hasOne(Spreventivemeasure::className(), ['id' => 'preventivemeasure_id']);
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
