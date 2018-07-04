<?php

namespace backend\modules\bi\models;

use Yii;

/**
 * This is the model class for table "{{%rd_numberOfEstablishmentByEcosector}}".
 *
 * @property int $id
 * @property int $registrationYear
 * @property string $registrationQuarter
 * @property string $province
 * @property string $region_code
 * @property string $district
 * @property string $geosector
 * @property string $cell
 * @property string $village
 * @property string $employerType
 * @property string $ownership
 * @property string $ecosector
 * @property string $employerStatus
 * @property int $numberOfEmployer
 * @property int $numberOfFemaleEmployee
 * @property int $numberOfMaleEmployee
 */
class RdNumberOfEstablishmentByEcosector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%rd_numberOfEstablishmentByEcosector}}';
    }

    /**
     * @inheritdoc
     */
    public static function getDb() 
    {
       return Yii::$app->get('db2'); // second database
    }
    
    public function rules()
    {
        return [
            [['registrationYear', 'numberOfEmployer', 'numberOfFemaleEmployee', 'numberOfMaleEmployee'], 'integer'],
            [['registrationQuarter'], 'string', 'max' => 9],
            [['province', 'district', 'geosector', 'cell', 'village', 'employerType', 'ownership', 'employerStatus'], 'string', 'max' => 45],
            [['region_code'], 'string', 'max' => 6],
            [['ecosector'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'registrationYear' => Yii::t('app', 'Registration Year'),
            'registrationQuarter' => Yii::t('app', 'Registration Quarter'),
            'province' => Yii::t('app', 'Province'),
            'region_code' => Yii::t('app', 'Region Code'),
            'district' => Yii::t('app', 'District'),
            'geosector' => Yii::t('app', 'Geosector'),
            'cell' => Yii::t('app', 'Cell'),
            'village' => Yii::t('app', 'Village'),
            'employerType' => Yii::t('app', 'Employer Type'),
            'ownership' => Yii::t('app', 'Ownership'),
            'ecosector' => Yii::t('app', 'Ecosector'),
            'employerStatus' => Yii::t('app', 'Employer Status'),
            'numberOfEmployer' => Yii::t('app', 'Number Of Employer'),
            'numberOfFemaleEmployee' => Yii::t('app', 'Number Of Female Employee'),
            'numberOfMaleEmployee' => Yii::t('app', 'Number Of Male Employee'),
        ];
    }
}
