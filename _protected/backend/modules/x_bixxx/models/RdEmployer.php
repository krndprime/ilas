<?php

namespace backend\modules\bi\models;

use Yii;

/**
 * This is the model class for table "{{%rd_employer}}".
 *
 * @property int $id
 * @property int $employer_id
 * @property int $registrationYear
 * @property int $registrationMonth
 * @property int $village_id
 * @property int $employerType_id
 * @property int $ownership_id
 * @property int $ecosector_id
 * @property int $employerStatus_id
 * @property int $closingYear
 * @property int $closingMonth
 * @property int $numberOfFemaleEmployee
 * @property int $numberOfMaleEmployee
 *
 * @property RdEmployee[] $rdEmployees
 */
class RdEmployer extends \yii\db\ActiveRecord
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
        return '{{%rd_employer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employer_id', 'registrationYear', 'registrationMonth', 'village_id', 'employerType_id', 'ownership_id', 'ecosector_id', 'employerStatus_id', 'closingYear', 'closingMonth', 'numberOfFemaleEmployee', 'numberOfMaleEmployee'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'employer_id' => Yii::t('app', 'Employer ID'),
            'registrationYear' => Yii::t('app', 'Registration Year'),
            'registrationMonth' => Yii::t('app', 'Registration Month'),
            'village_id' => Yii::t('app', 'Village ID'),
            'employerType_id' => Yii::t('app', 'Employer Type ID'),
            'ownership_id' => Yii::t('app', 'Ownership ID'),
            'ecosector_id' => Yii::t('app', 'Ecosector ID'),
            'employerStatus_id' => Yii::t('app', 'Employer Status ID'),
            'closingYear' => Yii::t('app', 'Closing Year'),
            'closingMonth' => Yii::t('app', 'Closing Month'),
            'numberOfFemaleEmployee' => Yii::t('app', 'Number Of Female Employee'),
            'numberOfMaleEmployee' => Yii::t('app', 'Number Of Male Employee'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdEmployees()
    {
        return $this->hasMany(RdEmployee::className(), ['employer_id' => 'employer_id']);
    }
}
