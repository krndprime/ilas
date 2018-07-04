<?php

namespace backend\modules\socialdialogue\models;

use Yii;
use common\models\User;
use backend\models\Svillage;

/**
 * This is the model class for table "{{%social_confederation}}".
 *
 * @property int $id
 * @property string $confederation
 * @property string $startDate
 * @property int $village_id
 * @property string $confederationRepresentativeNames
 * @property string $confederationRepresentativePhone
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFrag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property User $updatedBy0
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property SVillage $village
 */
class Socialconfederation extends \yii\db\ActiveRecord
{
    public $province_id;
    public $district_id;
    public $sector_id;
    public $cell_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%social_confederation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['confederation'], 'required'],
            [['startDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['village_id', 'createdBy', 'deletedFrag', 'deletedBy', 'updatedBy'], 'integer'],
            [['deleteReason'], 'string'],
            [['confederation', 'confederationRepresentativeNames'], 'string', 'max' => 45],
            [['confederationRepresentativePhone'], 'string', 'max' => 13],
            [['confederation'], 'unique'],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['village_id'], 'exist', 'skipOnError' => true, 'targetClass' => Svillage::className(), 'targetAttribute' => ['village_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'confederation' => Yii::t('app', 'Confederation'),
            'startDate' => Yii::t('app', 'Registration date'),
            'village_id' => Yii::t('app', 'Village'),
            'federationRepresentativeNames' => Yii::t('app', 'Representative names'),
            'federationRepresentativePhone' => Yii::t('app', 'Representative phone'),
            'createdBy' => Yii::t('app', 'Created by'),
            'createdOn' => Yii::t('app', 'Created on'),
            'deletedFrag' => Yii::t('app', 'Deleted frag'),
            'deletedBy' => Yii::t('app', 'Deleted by'),
            'deletedOn' => Yii::t('app', 'Deleted on'),
            'deleteReason' => Yii::t('app', 'Delete reason'),
            'updatedBy' => Yii::t('app', 'Updated by'),
            'updatedOn' => Yii::t('app', 'Updated on'),
            'province_id' => Yii::t('app', 'Province'),
            'district_id' => Yii::t('app', 'District'),
            'sector_id' => Yii::t('app', 'Sector'),
            'cell_id' => Yii::t('app', 'Cell'),
        ];
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
    public function getVillage()
    {
        return $this->hasOne(Svillage::className(), ['id' => 'village_id']);
    }
}
