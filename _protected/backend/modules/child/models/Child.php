<?php

namespace backend\modules\child\models;

use Yii;
use backend\models\Srelationship;
use backend\models\Sedulevel;
use backend\models\Svillage;
use backend\models\Sdistrict;
use backend\models\Sgeosector;
use backend\models\Ssex;
use backend\models\Scell;
use common\models\User;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%child}}".
 *
 * @property int $id
 * @property string $childFirstName
 * @property string $childMiddleName
 * @property string $childLastName
 * @property string $dateOfBirth
 * @property int $sex_id
 * @property int $edulevel_id
 * @property int $originDistrict_id
 * @property int $originSector_id
 * @property int $originCell_id
 * @property int $originVillage_id
 * @property string $guardianNames
 * @property string $contactPhone
 * @property int $relationship_id
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property Scell $originCell
 * @property Srelationship $relationship
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property Sedulevel $edulevel
 * @property Sdistrict $originDistrict
 * @property Sgeosector $originSector
 * @property Svillage $originVillage
 * @property Ssex $sex
 * @property User $updatedBy0
 * @property ChildEmployment[] $childEmployments
 * @property ChildFound[] $childFounds
 */
class Child extends \yii\db\ActiveRecord
{
    public $province_id;
    public $provincee_id;
    public $district_id;
    public $sector_id;
    public $cell_id;
    public $v_name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%child}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dateOfBirth', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['sex_id', 'edulevel_id', 'originDistrict_id', 'originSector_id', 'originCell_id', 'originVillage_id', 'relationship_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['deleteReason'], 'string'],
            [['childFirstName', 'childMiddleName', 'childLastName', 'guardianNames'], 'string', 'max' => 45],
            [['contactPhone'], 'string', 'max' => 13],
            [['originCell_id'], 'exist', 'skipOnError' => true, 'targetClass' => Scell::className(), 'targetAttribute' => ['originCell_id' => 'id']],
            [['relationship_id'], 'exist', 'skipOnError' => true, 'targetClass' => Srelationship::className(), 'targetAttribute' => ['relationship_id' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['edulevel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sedulevel::className(), 'targetAttribute' => ['edulevel_id' => 'id']],
            [['originDistrict_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sdistrict::className(), 'targetAttribute' => ['originDistrict_id' => 'id']],
            [['originSector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sgeosector::className(), 'targetAttribute' => ['originSector_id' => 'id']],
            [['originVillage_id'], 'exist', 'skipOnError' => true, 'targetClass' => Svillage::className(), 'targetAttribute' => ['originVillage_id' => 'id']],
            [['sex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ssex::className(), 'targetAttribute' => ['sex_id' => 'id']],
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
            'childFirstName' => Yii::t('app', 'First names'),
            'childMiddleName' => Yii::t('app', 'Middle name'),
            'childLastName' => Yii::t('app', 'Surname/Family name'),
            'dateOfBirth' => Yii::t('app', 'Date of birth'),
            'sex_id' => Yii::t('app', 'Sex'),
            'edulevel_id' => Yii::t('app', 'Education level'),
            'originDistrict_id' => Yii::t('app', 'District'),
            'originSector_id' => Yii::t('app', 'Sector'),
            'originCell_id' => Yii::t('app', 'Cell'),
            'originVillage_id' => Yii::t('app', 'Village'),
            'guardianNames' => Yii::t('app', 'Names'),
            'contactPhone' => Yii::t('app', 'Contact phone'),
            'relationship_id' => Yii::t('app', 'Relationship'),
            'createdBy' => Yii::t('app', 'Created by'),
            'createdOn' => Yii::t('app', 'Created on'),
            'deletedFlag' => Yii::t('app', 'Deleted flag'),
            'deletedBy' => Yii::t('app', 'Deleted by'),
            'deletedOn' => Yii::t('app', 'Deleted on'),
            'deleteReason' => Yii::t('app', 'Delete reason'),
            'updatedBy' => Yii::t('app', 'Updated by'),
            'updatedOn' => Yii::t('app', 'Updated on'),
            'province_id' => Yii::t('app', 'Province'),
            'provincee_id' => Yii::t('app', 'Province'),
            'district_id' => Yii::t('app', 'District'),
            'sector_id' => Yii::t('app', 'Sector'), 
            'cell_id' => Yii::t('app', 'Cell'),
            'v_name' => Yii::t('app', 'Child basic information'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOriginCell()
    {
        return $this->hasOne(Scell::className(), ['id' => 'originCell_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationship()
    {
        return $this->hasOne(Srelationship::className(), ['id' => 'relationship_id']);
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
    public function getEdulevel()
    {
        return $this->hasOne(Sedulevel::className(), ['id' => 'edulevel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOriginDistrict()
    {
        return $this->hasOne(Sdistrict::className(), ['id' => 'originDistrict_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOriginSector()
    {
        return $this->hasOne(Sgeosector::className(), ['id' => 'originSector_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOriginVillage()
    {
        return $this->hasOne(Svillage::className(), ['id' => 'originVillage_id']);
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
    public function getUpdatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'updatedBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildEmployments()
    {
        return $this->hasMany(Childemployment::className(), ['child_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildFounds()
    {
        return $this->hasMany(Childfound::className(), ['child_id' => 'id']);
    }

    public static function children()
    {
        $ChildData = ArrayHelper::map(Child::find()->where('childFirstName=0')->all(),'id','childFirstName');
        $ChildData[0] ='Other';
        return  $ChildData; 
        
    }
}
