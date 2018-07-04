<?php

namespace backend\modules\bi\models;

use Yii;

/**
 * This is the model class for table "{{%rd_numberOfEmployment}}".
 *
 * @property int $id
 * @property int $startEmploymentYear
 * @property string $startEmploymentQuarter
 * @property string $agegroup
 * @property string $employeeProvince
 * @property string $employeeRegion_code
 * @property string $employeeDistrict
 * @property string $employeeGeosector
 * @property string $employeeCell
 * @property string $employeeVillage
 * @property string $employerType
 * @property string $employerProvice
 * @property string $employerRegion_code
 * @property string $employerDistrict
 * @property string $employerGeosector
 * @property string $employerCell
 * @property string $employerVillage
 * @property string $ownership
 * @property string $ecosector
 * @property string $employerStatus
 * @property int $closingYear
 * @property int $closingMonth
 * @property string $occupation
 * @property string $experienceagegroup
 * @property int $numberOfEmployer
 * @property int $numberOfFemaleEmployee
 * @property int $numberOfMaleEmployee
 */
class RdNumberOfEmployment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function getDb() 
    {
       return Yii::$app->get('db2'); // second database
    }
    
    public static function tableName()
    {
        return '{{%rd_numberOfEmployment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['startEmploymentYear', 'closingYear', 'closingMonth', 'numberOfEmployer', 'numberOfFemaleEmployee', 'numberOfMaleEmployee'], 'integer'],
            [['startEmploymentQuarter'], 'string', 'max' => 9],
            [['agegroup', 'employeeRegion_code', 'employerRegion_code'], 'string', 'max' => 6],
            [['employeeProvince', 'employeeDistrict', 'employeeGeosector', 'employeeCell', 'employeeVillage', 'employerType', 'employerProvice', 'employerDistrict', 'employerGeosector', 'employerCell', 'employerVillage', 'ownership', 'employerStatus', 'experienceagegroup'], 'string', 'max' => 45],
            [['ecosector', 'occupation'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'startEmploymentYear' => Yii::t('app', 'Start Employment Year'),
            'startEmploymentQuarter' => Yii::t('app', 'Start Employment Quarter'),
            'agegroup' => Yii::t('app', 'Agegroup'),
            'employeeProvince' => Yii::t('app', 'Employee Province'),
            'employeeRegion_code' => Yii::t('app', 'Employee Region Code'),
            'employeeDistrict' => Yii::t('app', 'Employee District'),
            'employeeGeosector' => Yii::t('app', 'Employee Geosector'),
            'employeeCell' => Yii::t('app', 'Employee Cell'),
            'employeeVillage' => Yii::t('app', 'Employee Village'),
            'employerType' => Yii::t('app', 'Employer Type'),
            'employerProvice' => Yii::t('app', 'Employer Provice'),
            'employerRegion_code' => Yii::t('app', 'Employer Region Code'),
            'employerDistrict' => Yii::t('app', 'Employer District'),
            'employerGeosector' => Yii::t('app', 'Employer Geosector'),
            'employerCell' => Yii::t('app', 'Employer Cell'),
            'employerVillage' => Yii::t('app', 'Employer Village'),
            'ownership' => Yii::t('app', 'Ownership'),
            'ecosector' => Yii::t('app', 'Ecosector'),
            'employerStatus' => Yii::t('app', 'Employer Status'),
            'closingYear' => Yii::t('app', 'Closing Year'),
            'closingMonth' => Yii::t('app', 'Closing Month'),
            'occupation' => Yii::t('app', 'Occupation'),
            'experienceagegroup' => Yii::t('app', 'Experienceagegroup'),
            'numberOfEmployer' => Yii::t('app', 'Number Of Employer'),
            'numberOfFemaleEmployee' => Yii::t('app', 'Number Of Female Employee'),
            'numberOfMaleEmployee' => Yii::t('app', 'Number Of Male Employee'),
        ];
    }
}
