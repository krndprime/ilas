<?php

namespace backend\modules\bi\models;

use Yii;

/**
 * This is the model class for table "{{%rd_numberOfUniqueEmployee}}".
 *
 * @property int $id
 * @property int $startEmploymentYear
 * @property string $startEmploymentQuarter
 * @property string $agegroup
 * @property string $employeeProvince
 * @property string $region_code
 * @property string $employeeDistrict
 * @property string $employeeGeosector
 * @property string $employeeCell
 * @property string $employeeVillage
 * @property int $numberOfFemaleEmployee
 * @property int $numberOfMaleEmployee
 */
class RdNumberOfUniqueEmployee extends \yii\db\ActiveRecord
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
        return '{{%rd_numberOfUniqueEmployee}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['startEmploymentYear', 'numberOfFemaleEmployee', 'numberOfMaleEmployee'], 'integer'],
            [['startEmploymentQuarter'], 'string', 'max' => 9],
            [['agegroup', 'region_code'], 'string', 'max' => 6],
            [['employeeProvince', 'employeeDistrict', 'employeeGeosector', 'employeeCell', 'employeeVillage'], 'string', 'max' => 45],
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
            'region_code' => Yii::t('app', 'Region Code'),
            'employeeDistrict' => Yii::t('app', 'Employee District'),
            'employeeGeosector' => Yii::t('app', 'Employee Geosector'),
            'employeeCell' => Yii::t('app', 'Employee Cell'),
            'employeeVillage' => Yii::t('app', 'Employee Village'),
            'numberOfFemaleEmployee' => Yii::t('app', 'Number Of Female Employee'),
            'numberOfMaleEmployee' => Yii::t('app', 'Number Of Male Employee'),
        ];
    }
}
