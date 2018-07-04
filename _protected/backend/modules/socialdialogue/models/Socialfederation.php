<?php

namespace backend\modules\socialdialogue\models;

use Yii;
use common\models\User;
use backend\models\Svillage;

/**
 * This is the model class for table "{{%social_federation}}".
 *
 * @property int $id
 * @property int $confederation_id
 * @property string $federation
 * @property string $startDate
 * @property int $village_id
 * @property string $federationRepresentativeNames
 * @property string $federationRepresentativePhone
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFrag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property SocialConfederation $confederation
 * @property User $updatedBy0
 * @property SVillage $village
 */
class Socialfederation extends \yii\db\ActiveRecord
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
        return '{{%social_federation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['confederation_id', 'village_id', 'createdBy', 'deletedFrag', 'deletedBy', 'updatedBy'], 'integer'],
            [['federation'], 'required'],
            [['startDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['federation', 'federationRepresentativeNames'], 'string', 'max' => 45],
            [['federationRepresentativePhone'], 'string', 'max' => 13],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['confederation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Socialconfederation::className(), 'targetAttribute' => ['confederation_id' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
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
            'confederation_id' => Yii::t('app', 'Confederation'),
            'federation' => Yii::t('app', 'Federation'),
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
    public function getConfederation()
    {
        return $this->hasOne(Socialconfederation::className(), ['id' => 'confederation_id']);
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
    public function getVillage()
    {
        return $this->hasOne(Svillage::className(), ['id' => 'village_id']);
    }
}
