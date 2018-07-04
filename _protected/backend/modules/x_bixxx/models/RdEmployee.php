<?php

namespace backend\modules\bi\models;

use Yii;

/**
 * This is the model class for table "{{%rd_employee}}".
 *
 * @property int $id
 * @property int $employment_id
 * @property int $person_id
 * @property int $sex_id
 * @property int $age
 * @property int $employeeVillage_id
 * @property int $employer_id
 * @property int $ownership_id
 * @property int $ecosector_id
 * @property int $startEmploymentYear
 * @property int $startEmploymentMonth
 * @property int $employerVillage_id
 * @property int $occupation_id
 * @property int $experienceInThisOccupation
 * @property int $employerType_id
 * @property int $employerStatus_id
 * @property int $closingYear
 * @property int $closingMonth
 *
 * @property RdEmployer $employer
 */
class RdEmployee extends \yii\db\ActiveRecord
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
        return '{{%rd_employee}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employment_id', 'person_id', 'sex_id', 'age', 'employeeVillage_id', 'employer_id', 'ownership_id', 'ecosector_id', 'startEmploymentYear', 'startEmploymentMonth', 'employerVillage_id', 'occupation_id', 'experienceInThisOccupation', 'employerType_id', 'employerStatus_id', 'closingYear', 'closingMonth'], 'integer'],
            [['employer_id'], 'exist', 'skipOnError' => true, 'targetClass' => RdEmployer::className(), 'targetAttribute' => ['employer_id' => 'employer_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'employment_id' => Yii::t('app', 'Employment ID'),
            'person_id' => Yii::t('app', 'Person ID'),
            'sex_id' => Yii::t('app', 'Sex ID'),
            'age' => Yii::t('app', 'Age'),
            'employeeVillage_id' => Yii::t('app', 'Employee Village ID'),
            'employer_id' => Yii::t('app', 'Employer ID'),
            'ownership_id' => Yii::t('app', 'Ownership ID'),
            'ecosector_id' => Yii::t('app', 'Ecosector ID'),
            'startEmploymentYear' => Yii::t('app', 'Start Employment Year'),
            'startEmploymentMonth' => Yii::t('app', 'Start Employment Month'),
            'employerVillage_id' => Yii::t('app', 'Employer Village ID'),
            'occupation_id' => Yii::t('app', 'Occupation ID'),
            'experienceInThisOccupation' => Yii::t('app', 'Experience In This Occupation'),
            'employerType_id' => Yii::t('app', 'Employer Type ID'),
            'employerStatus_id' => Yii::t('app', 'Employer Status ID'),
            'closingYear' => Yii::t('app', 'Closing Year'),
            'closingMonth' => Yii::t('app', 'Closing Month'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployer()
    {
        return $this->hasOne(RdEmployer::className(), ['employer_id' => 'employer_id']);
    }
}
