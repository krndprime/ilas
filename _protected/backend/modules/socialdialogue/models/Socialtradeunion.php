<?php

namespace backend\modules\socialdialogue\models;

use Yii;
use common\models\User;
use backend\models\Snoyes;
use backend\modules\socialdialogue\models\Socialfederation;
use backend\models\Svillage;

/**
 * This is the model class for table "{{%social_tradeunion}}".
 *
 * @property int $id
 * @property string $tradeUnionName
 * @property int $federationAffiliation_id
 * @property string $tradeUnionStartDate
 * @property int $village_id
 * @property string $tradeUnionRepresentativeNames
 * @property string $tradeUnionRepresentativePhone
 * @property int $registeredByMIFOTRA_id
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deleteFlag
 * @property int $deleteBy
 * @property string $deleteOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property User $updatedBy0
 * @property User $deleteBy0
 * @property User $createdBy0
 * @property Svillage $village
 * @property Socialfederation $federationAffiliation
 * @property Snoyes $registeredByMIFOTRA
 */
class Socialtradeunion extends \yii\db\ActiveRecord
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
        return '{{%social_tradeunion}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['federationAffiliation_id', 'village_id', 'registeredByMIFOTRA_id', 'createdBy', 'deleteFlag', 'deleteBy', 'updatedBy'], 'integer'],
            [['tradeUnionStartDate', 'createdOn', 'deleteOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['tradeUnionName', 'tradeUnionRepresentativeNames'], 'string', 'max' => 45],
            [['tradeUnionRepresentativePhone'], 'string', 'max' => 13],
            [['tradeUnionName','federationAffiliation_id','village_id','registeredByMIFOTRA_id','tradeUnionStartDate','province_id','district_id','sector_id','cell_id','tradeUnionRepresentativeNames','tradeUnionRepresentativePhone'], 'required'],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
            [['deleteBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deleteBy' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['village_id'], 'exist', 'skipOnError' => true, 'targetClass' => Svillage::className(), 'targetAttribute' => ['village_id' => 'id']],
            [['federationAffiliation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Socialfederation::className(), 'targetAttribute' => ['federationAffiliation_id' => 'id']],
            [['registeredByMIFOTRA_id'], 'exist', 'skipOnError' => true, 'targetClass' => Snoyes::className(), 'targetAttribute' => ['registeredByMIFOTRA_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tradeUnionName' => Yii::t('app', 'Name'),
            'federationAffiliation_id' => Yii::t('app', 'Federation affiliated to'),
            'tradeUnionStartDate' => Yii::t('app', 'Started on'),
            'village_id' => Yii::t('app', 'Village'),
            'tradeUnionRepresentativeNames' => Yii::t('app', 'Representative names'),
            'tradeUnionRepresentativePhone' => Yii::t('app', 'Representative phone number'),
            'registeredByMIFOTRA_id' => Yii::t('app', 'Registered by MIFOTRA'),
            'createdBy' => Yii::t('app', 'Created by'),
            'createdOn' => Yii::t('app', 'Created on'),
            'deleteFlag' => Yii::t('app', 'Delete flag'),
            'deleteBy' => Yii::t('app', 'Delete by'),
            'deleteOn' => Yii::t('app', 'Delete on'),
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
    public function getDeleteBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'deleteBy']);
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
    public function getVillage()
    {
        return $this->hasOne(Svillage::className(), ['id' => 'village_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFederationAffiliation()
    {
        return $this->hasOne(Socialfederation::className(), ['id' => 'federationAffiliation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegisteredByMIFOTRA()
    {
        return $this->hasOne(Snoyes::className(), ['id' => 'registeredByMIFOTRA_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialVisitedcompanies()
    {
        return $this->hasMany(Socialvisitedcompany::className(), ['tradeUnion_id' => 'id']);
    }
}
