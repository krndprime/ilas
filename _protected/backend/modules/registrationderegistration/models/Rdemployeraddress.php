<?php

namespace backend\modules\registrationderegistration\models;

use Yii;
use backend\models\Svillage;
use common\models\User;

/**
 * This is the model class for table "{{%rd_employeraddress}}".
 *
 * @property int $id
 * @property int $employer_id
 * @property int $village_id
 * @property string $emailAddress
 * @property string $phoneNumber
 * @property string $pobox
 * @property string $physicalAddress
 * @property int $CreatedBy
 * @property string $CreatedOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property Rdemployer $employer
 * @property Svillage $village
 * @property User $createdBy
 * @property User $deletedBy0
 * @property User $updatedBy0
 */
class Rdemployeraddress extends \yii\db\ActiveRecord
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
        return '{{%rd_employeraddress}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employer_id', 'village_id', 'CreatedBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['CreatedOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['emailAddress', 'pobox', 'physicalAddress'], 'string', 'max' => 45],
            [['phoneNumber'], 'string', 'max' => 13],
            [['emailAddress'], 'email'],
            [['province_id','district_id','sector_id','cell_id','village_id','phoneNumber'], 'required'],
            [['employer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdemployer::className(), 'targetAttribute' => ['employer_id' => 'id']],
            [['village_id'], 'exist', 'skipOnError' => true, 'targetClass' => Svillage::className(), 'targetAttribute' => ['village_id' => 'id']],
            [['CreatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['CreatedBy' => 'id']],
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
            'village_id' => Yii::t('app', 'Village'),
            'emailAddress' => Yii::t('app', 'Email address'),
            'phoneNumber' => Yii::t('app', 'Phone number'),
            'pobox' => Yii::t('app', 'P.O.Box'),
            'physicalAddress' => Yii::t('app', 'Physical address'),
            'CreatedBy' => Yii::t('app', 'Created by'),
            'CreatedOn' => Yii::t('app', 'Created on'),
            'deletedFlag' => Yii::t('app', 'Deleted flag'),
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
    public function getEmployer()
    {
        return $this->hasOne(Rdemployer::className(), ['id' => 'employer_id']);
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
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'CreatedBy']);
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
    public function addresses($id)
    {
        return Rdemployeraddress::find()->where('employer_id=:u',['u'=>$id])->all();
        
    }
}
