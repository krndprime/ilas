<?php

namespace backend\modules\registrationderegistration\models;

use Yii;
use backend\models\Ssex;
use backend\models\Svillage;
use backend\models\Scountrycodeiso3166;
use backend\models\Sdocumenttype;
use common\models\User;

/**
 * This is the model class for table "{{%rd_person}}".
 *
 * @property int $id
 * @property int $document_id
 * @property int $country_id
 * @property string $nid
 * @property string $firstName
 * @property string $lastName
 * @property string $middleName
 * @property string $dateOfBirth
 * @property int $sex_id
 * @property int $village_id
 * @property string $phone
 * @property string $email
 * @property string $rssbNumber
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property SSex $sex
 * @property SVillage $village
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 * @property SCountrycodeIso3166 $country
 * @property SDocumenttype $document
 */
class Rdperson2 extends \yii\db\ActiveRecord
{
    public $province_id;
    public $district_id;
    public $sector_id;
    public $cell_id;
    public $v_name;
    public $documentnumber;
    public $passport;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%rd_person}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_id', 'country_id', 'sex_id', 'village_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['dateOfBirth', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['nid','passport'], 'string', 'max' => 16],
            [['firstName', 'lastName', 'middleName', 'email'], 'string', 'max' => 45],
            [['phone'], 'string', 'max' => 12],
            [['rssbNumber'], 'string', 'max' => 10],
            [['nid' ], 'unique'],
            // [['passport' ], 'passportunique'],
            [['email'], 'email'],
            [['document_id'], 'required'],
            [['sex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ssex::className(), 'targetAttribute' => ['sex_id' => 'id']],
            [['village_id'], 'exist', 'skipOnError' => true, 'targetClass' => Svillage::className(), 'targetAttribute' => ['village_id' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Scountrycodeiso3166::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['document_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sdocumenttype::className(), 'targetAttribute' => ['document_id' => 'id']],
        ];
    }

    // public function passportunique($attribute , $params){

    //     //$count = static::find()->where(['nid' => $this->passport])->count();
    //     $count = 1;
    //     if($count > 0){
            
    //         $this->addError($attribute, Yii::t('user', 'You entered an invalid date format.'));
    //     }

        

    // }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'document_id' => Yii::t('app', 'Document type'),
            'country_id' => Yii::t('app', 'Country'),
            'nid' => Yii::t('app', 'Rwanda ID number'),
            'firstName' => Yii::t('app', 'First name'),
            'lastName' => Yii::t('app', 'Surname/Family name'),
            'middleName' => Yii::t('app', 'Middle Name'),
            'dateOfBirth' => Yii::t('app', 'Date of birth'),
            'sex_id' => Yii::t('app', 'Sex'),
            'village_id' => Yii::t('app', 'Village'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'rssbNumber' => Yii::t('app', 'RSSB number'),
            'createdBy' => Yii::t('app', 'Created by'),
            'createdOn' => Yii::t('app', 'Created on'),
            'deletedFlag' => Yii::t('app', 'Deleted flag'),
            'deletedBy' => Yii::t('app', 'Deleted by'),
            'deletedOn' => Yii::t('app', 'Deleted on'),
            'deleteReason' => Yii::t('app', 'Delete reason'),
            'updatedBy' => Yii::t('app', 'Updated by'),
            'province_id' => Yii::t('app', 'Province'),
            'district_id' => Yii::t('app', 'District'),
            'sector_id' => Yii::t('app', 'Sector'), 
            'cell_id' => Yii::t('app', 'Cell'),
            'v_name' => Yii::t('app', 'Names'),
            'documentnumber' => Yii::t('app', 'Document number'),
            'passport' => Yii::t('app', 'Passport number'),
           
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSex()
    {
        return $this->hasOne(Ssex::className(), ['id' => 'sex_id']);
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
    public function getCountry()
    {
        return $this->hasOne(Scountrycodeiso3166::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocument()
    {
        return $this->hasOne(Sdocumenttype::className(), ['id' => 'document_id']);
    }
}
